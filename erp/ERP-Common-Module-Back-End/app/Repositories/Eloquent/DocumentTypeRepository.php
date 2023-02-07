<?php

namespace App\Repositories\Eloquent;

use App\Models\card\DocumentType;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Example;
use App\Repositories\IRepositories\IDocumentTypeRepository;
use App\Repositories\IRepositories\IExampleRepository;

class DocumentTypeRepository extends BaseRepository implements IDocumentTypeRepository
{
    public function model()
    {
        return DocumentType::class;
    }
    public function getAllByType($dtype)
    {
      return  DocumentType::where('dtype',$dtype)->get();

    }


}
