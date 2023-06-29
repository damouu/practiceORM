<?php

namespace src\domain;

use src\model\Item;

class ItemRepository
{
    public function getItem(int $id): Item
    {
        return Item::findOrFail($id);
    }

}