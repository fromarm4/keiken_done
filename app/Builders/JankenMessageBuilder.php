<?php

namespace App\Builders;

use App\Builders\MessageBuilder;

use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;

/**
 * じゃんけん
 */
class JankenMessageBuilder implements MessageBuilder
{
    /** @var string */
    private $packageId = '1';
    /** @var string */
    private $stickerId = '';
    /**
     * Build a message.
     *
     * @return \LINE\LINEBot\MessageBuilder
     */
    public function build()
    {
        $janken = [
            'グー',
            'パー',
            'チョキ',
        ];

        $stickerIds = [
            'win' => '117',
            'lose' => '112',
            'same' => '113',
        ];

        // ユーザーの手
        $user = mt_rand(0, 2);

        // botの手
        $bot = mt_rand(0, 2);

        $message1 = 'あなたは'.$janken[$user].'を出しました！';
        $message2 = '私は'.$janken[$bot].'を出しました！';

        // 勝敗判定
        if ($user == 0 && $bot == 2) {
            $result = 'あなたの勝ちです！';
            $this->stickerId = $stickerIds['lose'];
        } elseif ($user == 2 && $bot == 0) {
            $result = '私の勝ちです！';
            $this->stickerId = $stickerIds['win'];
        } elseif ($user > $bot) {
            $result = 'あなたの勝ちです！';
            $this->stickerId = $stickerIds['lose'];
        } elseif ($bot > $user) {
            $result = '私の勝ちです！';
            $this->stickerId = $stickerIds['win'];
        } elseif ($bot == $user) {
            $result = 'あいこです！';
            $this->stickerId = $stickerIds['same'];
        }

        $t1 = new TextMessageBuilder($message1);
        $t2 = new TextMessageBuilder($message2);
        $r = new TextMessageBuilder($result);
        $s = new StickerMessageBuilder($this->packageId, $this->stickerId);

        return (new MultiMessageBuilder())
                    ->add($t1)
                    ->add($t2)
                    ->add($r)
                    ->add($s)
                    ;
    }
}