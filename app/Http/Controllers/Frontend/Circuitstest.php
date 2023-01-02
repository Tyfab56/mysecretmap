

if ($userid) {
            $iduser = $userid->id;
            //  Chargement des circuit de cet user pour ce pays
            $circuits = Circuits::where('user_id', '=', $userid->id)->where('pays_id', '=', $idpays)->get();
            $nbcircuit = ($circuits->count());
    
            // Si pas de cictuit en créer un
            if ($nbcircuit == 0)
            {
                $circuit = new Circuits();
               
                $circuit->user_id = $iduser;
                $circuit->pays_id = $idpays;
                $circuit->titrecircuit =  $pays->pays;
                $circuit->save();

               

                // Inserer le point par defaut
                $idspotdefaut = Default_spots::where('pays_id','=',$idpays)->first()->spot_id;
                // Creation du premier point
                $firstpoint = new Circuits_details();

                $firstpoint->circuit_id = $circuit->id;
                $firstpoint->rang = 1;
                $firstpoint->spot_id = $idspotdefaut;
                $firstpoint->save();
                $circuits = Circuits::where('user_id', '=', $userid->id)->where('pays_id', '=', $idpays)->get();

            }      

        } else {
            $circuits = null;
        }