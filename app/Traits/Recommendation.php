<?php
namespace App\Traits;

use App\Models\Usercluster;
use App\Models\Userprofile;


trait Recommendation{

    public function getSameClusterUser()
    {
       $userprofile_id = \Auth::user()->userprofile->id;

       $user_cluster = Usercluster::whereUserprofile_id($userprofile_id)->first();

       $sameClusterUser = Usercluster::whereCluster($user_cluster->cluster)->get();

       return $sameClusterUser;
    }

    public function recommendPlaces()
    {
      $sameClusterUser = $this->getSameClusterUser();
      $recommendDestination = [];
      foreach($sameClusterUser as $usercluster)
      {
         $userprofile = Userprofile::whereId($usercluster->userprofile_id)->first();
         $recommendDestination[$userprofile->id] = $userprofile->destinationFollower;
      }

      // dd($this->getRandomDestination($recommendDestination));
      return $this->getRandomDestination($recommendDestination);
      // return $recommendDestination;
    }

    public function getRandomDestination($recommendDestination)
    {
      $Rdestinations = [];
      foreach($recommendDestination as $key=> $recommend)
      {
         if($recommend->count() > 0)
         {
            $Rdestinations[] = $recommend;
         }
      }

      return $Rdestinations;
    }

}



 ?>
