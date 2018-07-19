<?php
namespace App\Base\Selectors;

/**
 * AbstractSelector class.
 * The only responsibility of a Selector is wrapping the identifier, commonly the $id.
 * Every Entity may have a corresponding Selector.
 *
 * @package App\Base\Selectors
 * @author Ilya Khanataev <contact@mevatex.com>
 */
abstract class AbstractSelector
{

    /** @var  int */
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int the ID
     */
    public function __toString()
    {
        return $this->getId();
    }

}