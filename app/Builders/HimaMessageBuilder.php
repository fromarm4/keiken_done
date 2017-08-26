<?php

namespace App\Builders;

use App\Builders\MessageBuilder;

use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;

/**
 * 暇
 */
class HimaMessageBuilder implements MessageBuilder
{
    /** @var string */
    private $message = "暇ですか？";
    /** @var string */
    private $packageId = '1';
    /** @var string */
    private $stickerId = '116';
    /**
     * Build a message.
     *
     * @return \LINE\LINEBot\MessageBuilder
     */
    public function build()
    {

        $s = new StickerMessageBuilder($this->packageId, $this->stickerId);
        $c = new TemplateMessageBuilder(
            $this->message,
            new ConfirmTemplateBuilder($this->message, [
                new MessageTemplateActionBuilder('いいえ', 'いいえ'),
                new MessageTemplateActionBuilder('はい', 'じゃんけん')
            ])
        );
        return (new MultiMessageBuilder())
                    ->add($s)
                    ->add($c)
                    ;
    }
}