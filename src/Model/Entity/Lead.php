<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lead Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $cargo
 * @property string $empresa
 * @property string $website
 * @property string $region_pais
 * @property string $telefono
 * @property string $LinkedIn
 * @property string $Industria
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Lead extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
