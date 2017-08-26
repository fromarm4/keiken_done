<?php

namespace App\Builders;

use App\Builders\MessageBuilder;

use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;

/**
 * それ以外の文言
 */
class OtherMessageBuilder implements MessageBuilder
{
    /** @var string */
    private $message = "[ 募集 ] または [ boshu ] と話しかけていただければ、新着の経験談の募集投稿を紹介します。\n
[ 経験談 ] または [ keiken ] と話しかけていただければ、新着の経験談投稿を紹介します。";
    /** @var string */
    private $packageId = '1';
    /** @var string */
    private $stickerId = '134';
    /**
     * Build a message.
     *
     * @return \LINE\LINEBot\MessageBuilder
     */
    public function build()
    {
        $t = new TextMessageBuilder($this->message);
        $s = new StickerMessageBuilder($this->packageId, $this->stickerId);
        return (new MultiMessageBuilder())
                    ->add($t)
                    ->add($s)
                    ;
    }
}