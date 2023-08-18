namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vente; // Assurez-vous d'avoir le modèle approprié pour les ventes

class ShopifyWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Traitez les données reçues du webhook Shopify
        $data = $request->json()->all();

        // Mettez à jour votre base de données avec les informations de vente
        Vente::create([
            'nom_client' => $data['customer']['first_name'],
            // ... autres champs
        ]);

        return response()->json(['message' => 'Webhook traité avec succès'], 200);
    }
}
