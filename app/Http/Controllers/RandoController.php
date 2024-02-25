<?php
namespace App\Http\Controllers;

use App\Models\RandoSpot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class RandoController extends Controller
{
    
    public function listRandos(Request $request)
    {
        $query = RandoSpot::query();
        if ($request->input('search')) 
            {
                $query->where('name', 'like', '%' . $request->search . '%');
            }

        $randos = $query->paginate(10); // Modifiez le nombre selon le nombre d'items que vous souhaitez par page

        return view('admin.randos.listrandos', compact('randos'));
    }

    public function create()
    {
        return view('admin.randos.create');
    }
    public function videohike()
    {
        // Assumons que vous voulez récupérer la vidéo pour la langue actuellement définie dans l'application
        $locale = app()->getLocale();
    
        // Récupérer la dernière randonnée ajoutée et sa traduction pour la langue spécifiée
        $latestRando = RandoSpot::whereHas('translations', function ($query) use ($locale) {
                            $query->where('locale', $locale);
                        })
                        ->latest('created_at')
                        ->first();
    
        // Si une randonnée a été trouvée, récupérer le video_link de sa traduction
        $latestVideoLink = optional($latestRando->translate($locale))->video_link;
    
        return view('frontend.videohike', compact('latestVideoLink'));
    }
    


    public function store(Request $request)
    {
        $request->validate([
            'spot_id' => 'required|integer|exists:spots,id', // Assurez-vous que le spot existe
          
        ]);
    
        $rando = new RandoSpot([
            'spot_id' => $request->spot_id,
        
            // Ajoutez ici d'autres champs selon votre modèle
        ]);
    
        $rando->save();
    
        return redirect()->route('admin.randos.listrandos')->with('success', 'Nouvelle randonnée ajoutée avec succès.');
    }

    public function storeTranslations(Request $request)
{
    // Valider la requête

 
    $request->validate([
        'language' => 'required|string',
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'video_link' => 'required',
        
    ]);

    // Trouver la randonnée créée précédemment ou utiliser une autre logique selon votre application
    $rando = RandoSpot::latest()->first();

    // Assumer que vous utilisez un package ou une logique pour gérer les traductions
    // Exemple d'ajout de traductions
    $rando->translateOrNew($request->language)->nom = $request->titre;
    $rando->translateOrNew($request->language)->description = $request->description;
    $rando->translateOrNew($request->language)->video_link = $request->video_link;

 
    // Vérification qu'un poster n'est pas deja enregistré
    if (!empty($rando->translateOrNew($request->language)->poster)) {
        $bucket = 'mysecretmap';
        $disk = Storage::disk('wasabi');
        $filedelete = parse_url($rando->translateOrNew($request->language)->poster);
        $disk->delete($filedelete);
    }

    // Ajout du nouveau poster
    $file = $request->file('poster');
    $extension = $file->getClientOriginalExtension();
    $imgname =  $file->getClientOriginalName();;
    $imgname = str_replace(' ', '-', $imgpanoname);
    $imgname = uniqid() . "_" . $request->payslist . "_" . $imgname;
    $disk = Storage::disk('wasabi');
    $bucket = 'mysecretmap';
    $width = 960;
    $height = 480;
    $canvas = Image::canvas($width, $height);

    $imagefinale  = Image::make($file)->resize(
        $width,
        null,
        function ($constraint) {
            $constraint->aspectRatio();
        }
    );

    $canvas->insert(
        $imagefinale,
        'center'
    );
    $canvas->encode($extension);

    $disk->put('/large/large-' . $imgname, (string) $canvas, 'public');
    $imgname = $disk->url('large/large-' . $imgname);
    $rando->translateOrNew($request->language)->poster = $imgname;
    $rando->save();

    // Rediriger vers une page appropriée avec un message de succès
    return redirect()->route('admin.randos.create')
    ->with('success', 'Traduction ajoutée avec succès. Vous pouvez maintenant ajouter une traduction dans une autre langue.')
    ->with('previous_language', $request->language);
    }

    public function edit($id)
    {
        
    $rando = RandoSpot::with('translations')->findOrFail($id);
    $langs = ['en', 'fr'];
    return view('admin.randos.edit', compact('rando', 'langs'));
    }

    public function update(Request $request, $id)

     {

        $rando = RandoSpot::findOrFail($id);
   
        $validated = $request->validate([
            'selected_lang' => 'required|string',
            'title' => 'required|string',
            'description' => 'required',
            'video_link' => 'required',
            'poster' => 'required',
        ]);

      

        $selectedLang = $request->input('selected_lang');

        $rando->translateOrNew($selectedLang)->nom = $validated['title'];
        $rando->translateOrNew($selectedLang)->description = $validated['description'];
        $rando->translateOrNew($selectedLang)->video_link = $validated['video_link'];
        $rando->translateOrNew($selectedLang)->poster = $validated['poster'];
        $rando->save();

        return back()->with('success', 'Randonnée mise à jour avec succès.');
      }

    

    public function destroy($id)
    {
        $rando = RandoSpot::findOrFail($id);
        $rando->delete();

        return redirect()->route('admin.randos.listrandos')->with('success', 'Randonnée supprimée avec succès.');
    }


    public function storeBaseInfo(Request $request)
{
    // Validation des données du formulaire
    $validated = $request->validate([
        'spot_id' => 'required|integer|exists:spots,id', 
      
    ]);

    // Création de la nouvelle randonnée avec les données validées
    $rando = new RandoSpot();
    $rando->spot_id = $validated['spot_id'];
    
    // Vous pouvez ajouter ici d'autres champs selon votre modèle RandoSpot

    $rando->save(); // Sauvegarde de la randonnée dans la base de données

    // Retour d'une réponse JSON en cas de succès
    return response()->json([
        'success' => 'Informations de base enregistrées avec succès.',
        'randoId' => $rando->id, // Retourne l'ID de la randonnée pour utilisation ultérieure si nécessaire
    ]);
}

    
}
