<?php

namespace App\Services;

use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\SsmlVoiceGender;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;

class GoogleTTSService
{
    protected $client;

    public function __construct()
    {
        $this->client = new TextToSpeechClient();
    }

    public function convertTextToSpeech($text)
    {
        // 入力テキストの設定
        $input = new SynthesisInput();
        $input->setText($text);

        // 音声の選択パラメーター
        $voice = new VoiceSelectionParams();
        $voice->setLanguageCode('en-US');  // 日本語を使う場合は 'ja-JP' などに変更
        $voice->setSsmlGender(SsmlVoiceGender::FEMALE);  // 声の性別も設定可能

        // 音声出力の設定（MP3形式で取得）
        $audioConfig = new AudioConfig();
        $audioConfig->setAudioEncoding(AudioConfig::MP3);

        // TTSリクエストを送信
        $response = $this->client->synthesizeSpeech($input, $voice, $audioConfig);

        // 音声データを取得
        $audioContent = $response->getAudioContent();

        // 音声データを保存（適切なディレクトリに変更してください）
        $outputFile = storage_path('app/public/output.mp3');
        file_put_contents($outputFile, $audioContent);

        return $outputFile;
    }
}
