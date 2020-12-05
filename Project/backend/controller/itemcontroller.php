<?php
include_once('model/item.php');
class ItemController extends Item
{
	
	public function createItem($name,$fullpath,$code,$size,$color,$price,$pro_id)
	{
		return $this->add($name,$fullpath,$code,$size,$color,$price,$pro_id);
			//echo "success";
		
    }
    public function productid()
	{
		return $this->getpro();
    }
    
	public function showitem()
	{
		return $this->getitem();
	}
    
    public function viewitem($itemid)
	{ 
		return $this->getviewitem($itemid);
	}
    public function edititem($id,$name,$fullpath,$code,$size,$color,$price,$pro_id)
    {
        return $this->updateitem($id,$name,$fullpath,$code,$size,$color,$price,$pro_id);

    }
    public function deleteitem($itemid){
    	//echo "success";
    	return $this->getdeleteitem($itemid);
    }
}
?>