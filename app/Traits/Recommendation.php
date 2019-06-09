<?php
namespace App\Traits;

use App\Models\Usercluster;
use App\Models\Userprofile;

trait Recommendation{

    public function getSameClusterUser()
    {
       $userprofile_id = \Auth::user()->userprofile->id;

       $user_cluster = Usercluster::whereUserprofile_id($userprofile_id)->first();


       // dd($user_cluster);

       if($user_cluster){
        $sameClusterUser = Usercluster::whereCluster($user_cluster->cluster)->where('userprofile_id', '!=', $userprofile_id)->get();

        return $sameClusterUser;
       }
       
    }

    public function recommendPlaces()
    {
      $sameClusterUser = $this->getSameClusterUser();

      //if this user is only one in cluster
      if(count($sameClusterUser) == 0){
          $userprofile = \Auth::user()->userprofile;
          
          //get all destination type where user has choose while registration
          $destinationType = [];

          foreach($userprofile->toArray() as $key => $value){
              if($value == 1){
                $destinationType[] = $key;
              }
          }

        //collection object which will collect all destination which type is selected by user at time of registration
        $destinations = collect([]);
        for($i=0; $i<sizeof($destinationType); $i++){
          $desti = \App\Models\Destination::where('destination_type', $destinationType[$i])->get();
          $destinations = $destinations->merge($desti);
        }
        
        //recommending 4 destination from to user if collection is more then 4
        if($destinations->count() > 4){
           $Rdestination = $destinations->random(4);
           return $Rdestination;
           die;
        } else {
          $Rdestination = $destinations;
          return $Rdestination;
          die;
        }
       
      } else {

      //collection of destination which is followed by the user in same cluster with recommendee user.
      $recommendDestination = collect([]);
      foreach($sameClusterUser as $usercluster)
      {
         $userprofile = Userprofile::whereId($usercluster->userprofile_id)->first();
         $followedDesti = $userprofile->destinationFollower;
         $recommendDestination = $recommendDestination->merge($followedDesti);
      }

      //multiple user have followed same destination so getting unique destination.
      $uniqueDestination = $recommendDestination->unique('id');

      //recommending 4 destination from to user if collection is more then 4
      if($uniqueDestination->count() > 4){
           $Rdestination = $uniqueDestination->random(4);
           return $Rdestination;
           die;
        } else {
          $Rdestination = $uniqueDestination;
          return $Rdestination;
          die;
        }

      return $Rdestination;
      
    }

  }

}



 ?>
