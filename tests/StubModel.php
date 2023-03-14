<?php

class StubModel extends \Illuminate\Database\Eloquent\Model
{
    public function getUpdatedAtColumn(): string
    {
        return 'updated_at';
    }
}
