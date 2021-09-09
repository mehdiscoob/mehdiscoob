<?php


namespace App\Repository\Admin\Seminar;


use App\Model\Group;

class GroupRepo
{
    public function getAllgroups()
    {
        return Group::all();
    }


    public function getGroupByRoles($id)
    {
        return Group::with("roles")->where('id',$id)->get();
    }

    public function getmodirkarshenasgroup()
    {
        return Group::find(1)->users;
    }
    public function getkarshenasgroup()
    {
        return Group::find(2)->users;
    }
    public function getGoruoById($id)
    {
        return Group::where('id',$id)->first();
//        dd(Group::where('id',$id)->get());
    }

    public function getGroupByName($name)
    {
        return Group::where('name',$name)->first();
    }

    public function checkGroupExistByName($name)
    {
        if (Group::where('name',$name)->exists())
            return true;

        return false;
    }


    public function checkGroupExistById($id)
    {
        if ($this->getGoruoById($id) !=null)
            return true;

        return false;
    }



    public function insertGroup($name)
    {
        if ($name!="0" && strlen($name)>0)
        {
            if (!$this->checkGroupExistByName($name))
            {
                $group=new Group();
                $group->name=$name;
                if ($group->save())
                {
                    return "success";
                }
                return "error";
            }
            else
            {
                return "registered";
            }
        }
        return "notEnteredName";
    }


    public function updateGroup($id,$newName)
    {
        if (!$this->checkGroupExistByName($newName))
        {
            if ($this->getGoruoById($id) != null)
            {
                $group=$this->getGoruoById($id);
                $group->name=$newName;
                if ($group->save())
                {
                    return "success";
                }
                return "error";
            }
            else
            {
                return "notFound";
            }
        }
        else
        {
            return "registered";
        }



    }


    public function deleteGroup($id)
    {
        $group=Group::where(['id'=>$id])->first();
        if ($group->delete())
            return "success";

        return "error";
    }




}
