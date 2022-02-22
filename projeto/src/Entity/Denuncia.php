<?php
namespace App\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Denuncia
 *
 * @ORM\Table(name="denuncia")
 * @ORM\Entity
 */
class Denuncia
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bairro", type="string", length=200, nullable=true)
     */
    private $bairro = null;

    /**
     * @var string
     *
     * @ORM\Column(name="logradouro", type="string", length=200, nullable=true)
     */
    private $logradouro = null;

    /**
     * @var string
     *
     * @ORM\Column(name="complemento", type="string", length=200,nullable=true)
     */
    private $complemento = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="cep", type="integer", nullable=true)
     */
    private $cep = null;

    /**
     * @var string
     *
     * @ORM\Column(name="cadastro", type="string", length=10,nullable=true)
     */
    private $cadastro = null;

    /**
     * @var float
     *
     * @ORM\Column(name="latitu", type="float", nullable=true)
     */
    private $latitude = null;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", nullable=true)
     */
    private $longitude = null;

    /**
     * @var string
     *
     * @ORM\Column(name="observacao", type="text", nullable=true)
     */
    private $observacao = null;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bairro.
     *
     * @param string|null $bairro
     *
     * @return Denuncia
     */
    public function setBairro($bairro = null)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro.
     *
     * @return string|null
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set logradouro.
     *
     * @param string $logradouro
     *
     * @return Denuncia
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Get logradouro.
     *
     * @return string
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Set complemento.
     *
     * @param string $complemento
     *
     * @return Denuncia
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento.
     *
     * @return string
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set cep.
     *
     * @param integer $cep
     *
     * @return Denuncia
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get cep.
     *
     * @return integer
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set cadastro.
     *
     * @param string $cadastro
     *
     * @return Denuncia
     */
    public function setCadastro($cadastro)
    {
        $this->cadastro = $cadastro;

        return $this;
    }

    /**
     * Get cadastro.
     *
     * @return string
     */
    public function getCadastro()
    {
        return $this->cadastro;
    }
    
    /**
     * Set latitude.
     *
     * @param float $latitude
     *
     * @return Denuncia
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude.
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude.
     *
     * @param float $longitude
     *
     * @return Denuncia
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude.
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
    

    /**
     * Set observacao.
     *
     * @param string $observacao
     *
     * @return Denuncia
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get observacao.
     *
     * @return string
     */
    public function getObservacao()
    {
        return $this->observacao;
    }
}
