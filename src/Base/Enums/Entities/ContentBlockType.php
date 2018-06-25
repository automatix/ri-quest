<?php
namespace App\Base\Enums\Entities;

use App\Base\Enums\AbstractEnum;

/**
 * @method static ContentBlockType TEXT()
 * @method static ContentBlockType LINK()
 * @method static ContentBlockType IMAGE()
 * @method static ContentBlockType AUDIO()
 * @method static ContentBlockType VIDEO()
 *
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class ContentBlockType extends AbstractEnum
{

    const TEXT = 'text';
    const LINK = 'link';
    const IMAGE = 'image';
    const AUDIO = 'audio';
    const VIDEO = 'video';

}
