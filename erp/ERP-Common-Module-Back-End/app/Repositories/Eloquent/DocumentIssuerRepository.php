<?php

namespace App\Repositories\Eloquent;


use App\Models\DocumentIssuer\DocumentIssuer;
use App\Repositories\IRepositories\IDocumentIssuerRepository;


class DocumentIssuerRepository extends BaseRepository implements IDocumentIssuerRepository
{
    public function model()
    {
        return DocumentIssuer::class;
    }
}
