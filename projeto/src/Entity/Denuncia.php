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
    private $bairro = 'null';

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=200, nullable=false, options={"fixed"=true})
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;


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
    public function setbairro($bairro = null)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro.
     *
     * @return string|null
     */
    public function getbairro()
    {
        return $this->bairro;
    }

    /**
     * Set slug.
     *
     * @param string $slug
     *
     * @return Denuncia
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set content.
     *
     * @param string $content
     *
     * @return Denuncia
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
