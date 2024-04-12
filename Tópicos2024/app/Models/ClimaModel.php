<?php

namespace App\Models;

use CodeIgniter\Model;

class ClimaModel extends Model
{
    protected $table = 'clima';
    protected $primaryKey = 'idClima';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = ['latitud', 'longitud', 'ubicacion', 'fecha', 'hora', 'temperatura', 'humedad', 'altitud', 'sensacionTermica', 'tipo', 'CP'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getUbicaciones()
    {
        $db = db_connect();
        $builder = $db->table('clima')
            ->select('ubicacion')
            ->groupBy('ubicacion');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getClimaByCP()
    {
        $request = request();
        $CP = $request->getGet('CP');
        $db = db_connect();
        $builder = $db->table('clima')
            ->select('latitud,longitud,fecha,hora,temperatura,humedad')
            ->where('CP', $CP);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getClimaByFechas()
    {
        $request = request();
        $fechaInicial = $request->getGet('fechaInicial');
        $fechaFinal = $request->getGet('fechaInicial');
        $db = db_connect();
        $builder = $db->table('clima')
            ->select('latitud,longitud,fecha,hora,temperatura,humedad')
            ->where('fecha>=', $fechaInicial)->orWhere('fecha<=', $fechaFinal);
        $query = $builder->get();
        return $query->getResult();
    }
}

