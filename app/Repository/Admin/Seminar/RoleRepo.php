<?php


namespace App\Repository\Admin\Seminar;


use App\Model\Role;

class RoleRepo
{

    public function getAllRoles()
    {
        return Role::all();
    }

    public function getRoleById($id)
    {
        return Role::where('id',$id)->first();
    }

    public function getRoleByName($name)
    {
        return Role::where('name',$name)->firts();
    }

    public function checkRoleExistByName($name)
    {
        if (Role::where('name',$name)->exists())
            return true;

        return false;
    }

    public function checkRoleExistById($id)
    {
        if (Role::where('id',$id)->exists())
            return true;

        return false;
    }

    public function insertRole($name)
    {
        if (!$this->checkRoleExistByName($name))
        {
            if (strlen($name)>0)
            {
               $role=new Role();
               $role->name=$name;
               if ($role->save())
                   return "success";

               return "error";
            }
            return "notEnteredName";
        }
        else
        {
            return "registered";
        }

    }


    public function updateRole($id,$newName)
    {
        if (!$this->checkRoleExistByName($newName))
        {
            if ($this->getRoleById($id) != null)
            {
                $role=$this->getRoleById($id);
                $role->name=$newName;
                if ($role->save())
                {
                    return "success";
                }
                return "error";
            }
            else
            {
                return "idError";
            }
        }
        else
        {
            return "registered";
        }



    }


    public function deleteRole($id)
    {
        $role=null;
        if ($this->checkRoleExistById($id))
        {
            $role=$this->getRoleById($id);
            if ($role->delete())
                return "success";
            return "error";
        }
        else
        {
            return "notFound";
        }
    }



}
