<?php


namespace App\Controllers;


use App\Core\Responses\Response;
use App\Models\Activities;
use App\Models\User;

class ActivityController extends \App\Core\AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        return $this->html();
    }

//    public function activity() {
//        return $this->json(Activities::getAll());
//    }

    public function activity()
    {
        $activities = Activities::getAll();
        $this->assignUser($activities);
//        $users = User::getAll();
//
//        foreach ($activities as $activity) {
//            foreach ($users as $user) {
//                if ($user->getId() == $activity->getUserId()) {
//                    $activity->setName($user->getName());
//                }
//            }
////            $user = User::getOne(1);
////            $activity->setName('$user.id_user');
//        }
//
//        array_map(function ($activity) {
//            $activity->loadUser();
//        }, $activities);
//
        return $this->json($activities);

    }

    public function users()
    {
        return $this->json(User::getAll());
    }

    public function assignUser($activities)
    {
        $users = User::getAll();
        /** @var Activities $activity */
        foreach ($activities as $activity) {
            /** @var User $user */
            foreach ($users as $user) {
                if ($activity->getUserId() == $user->getId()) {
                    $activity->setUser($user);
                }
            }
        }
    }
}