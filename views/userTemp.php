<?php
class UserTemp {
    public function getUserType() {
        $userType = "Administrador";
        //$userType = "Cliente";

        return $userType;
    }

    public function getUserId() {
        $userId = 1;

        return $userId;
    }

    public function getLogStatus() {
        //$logStatus = "LogIn";
        $logStatus = "LogOut";

        return $logStatus;
    }
}
?>