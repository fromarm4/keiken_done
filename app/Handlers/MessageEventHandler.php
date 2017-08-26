<?php
namespace App\Handlers;

use App\Handlers\EventHandler;

use App\Builders\NotCoveredMessageBuilder;
use App\Builders\BoshuMessageBuilder;
use App\Builders\KeikenMessageBuilder;
use App\Builders\HimaMessageBuilder;
use App\Builders\OtherMessageBuilder;
use App\Builders\JankenMessageBuilder;
use App\Builders\FortuneMessageBuilder;

use LINE\LINEBot;
use LINE\LINEBot\Response;
use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\Event\MessageEvent\TextMessage;

class MessageEventHandler implements EventHandler
{
    /** @var \LINE\LINEBot */
    protected $bot;
    /** @var \LINE\LINEBot\Event\MessageEvent */
    protected $event;
    /** @var array */
    protected $triggerWordOfBoshu = ['募集', 'boshu'];
    /** @var array */
    protected $triggerWordOfKeiken = ['経験談', 'keiken'];
    /** @var array */
    protected $triggerWordOfHima = ['暇', 'hima'];
    /** @var array */
    protected $triggerWordOfJanken = ['じゃんけん', 'janken'];
    /** @var array */
    protected $triggerWordOfFortune = ['うらない', 'fortune'];
    /**
     * Create a new event instance.
     *
     * @param \LINE\LINEBot $bot
     * @param \LINE\LINEBot\Event\MessageEvent $event
     */
    public function __construct(LINEBot $bot, MessageEvent $event)
    {
        $this->bot = $bot;
        $this->event = $event;
    }
    /**
     * Handle the event.
     *
     * @return \LINE\LINEBot\Response
     */
    public function handle()
    {
        // テキストメッセージ以外
        if (!$this->event instanceof TextMessage) {
            return $this->notCoverd();
        }

        // 入力文字の正規化
        $text = $this->_trim($this->event->getText());
        $lowerText = mb_strtolower($text);

        // 受信メッセージを判定して返信する
        $words = [
            'boshu',
            'keiken',
            'hima',
            'janken',
            'fortune',
        ];

        foreach ($words as $word) {
            if (in_array($lowerText, $this->{'triggerWordOf'.ucwords($word)})) {
                return $this->$word();
            }
        }

        if ($text == 'いいえ') {
            return new Response(200, json_encode(['cancel' => true]));
        }

        // それ以外の文言
        return $this->other();
    }
    /**
     * テキストメッセージ以外
     *
     * @return \LINE\LINEBot\Response
     */
    protected function notCoverd()
    {
        return $this->reply(new NotCoveredMessageBuilder);
    }
    /**
     * 募集中の経験談
     *
     * @return \LINE\LINEBot\Response
     */
    protected function boshu()
    {
        return $this->reply(new BoshuMessageBuilder);
    }
    /**
     * みんなからの経験談
     *
     * @return \LINE\LINEBot\Response
     */
    protected function keiken()
    {
        return $this->reply(new KeikenMessageBuilder);
    }
    /**
     * 暇
     *
     * @return \LINE\LINEBot\Response
     */
    protected function hima()
    {
        return $this->reply(new HimaMessageBuilder);
    }
    /**
     * じゃんけん
     *
     * @return \LINE\LINEBot\Response
     */
    protected function janken()
    {
        return $this->reply(new JankenMessageBuilder);
    }
    /**
     * うらない
     *
     * @return \LINE\LINEBot\Response
     */
    protected function fortune()
    {
        return $this->reply(new FortuneMessageBuilder);
    }
    /**
     * それ以外の文言
     *
     * @return \LINE\LINEBot\Response
     */
    protected function other()
    {
        return $this->reply(new OtherMessageBuilder);
    }
    /**
     * 返信する
     *
     * @return \LINE\LINEBot\Response
     */
    protected function reply($instance)
    {
        $builder = $instance->build();
        return $this->bot->replyMessage(
            $this->event->getReplyToken(),
            $builder
        );
    }
    /**
     * トリム(半角・全角スペース・改行コード)
     *
     * @param string $value
     * @return string
     */
    protected function _trim($value)
    {
        return preg_replace('/(\s|　|\n)/u', '', $value);
    }
}