<?php

namespace App\Services;

use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\SsmlVoiceGender;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;

class GoogleTTSService
{
    protected $client;

    public function __construct()
    {
        $this->client = new TextToSpeechClient();
    }

    /**
     * テキストを音声に変換し、音声ファイルのURLを返します。
     *
     * @param string $text 読み上げるテキスト
     * @param string $languageCode 言語コード（例: 'ja-JP'）
     * @param string $gender 声の性別（'MALE', 'FEMALE', 'NEUTRAL'）
     * @return string 音声ファイルのパス
     */
    public function convertTextToSpeech($text, $languageCode = 'ja-JP', $gender = SsmlVoiceGender::FEMALE)
    {
        // 入力テキストの設定
        $input = new SynthesisInput();
        $input->setText($text);

        // 音声の選択パラメーター
        $voice = new VoiceSelectionParams();
        $voice->setLanguageCode($languageCode);
        $voice->setSsmlGender($gender);

        // 音声出力の設定（MP3形式）
        $audioConfig = new AudioConfig();
        $audioConfig->setAudioEncoding(AudioEncoding::MP3);

        // TTSリクエストを送信
        $response = $this->client->synthesizeSpeech($input, $voice, $audioConfig);

        // 音声データを取得
        $audioContent = $response->getAudioContent();

        // 音声データを保存（ユニークなファイル名を生成）
        $fileName = 'tts_' . uniqid() . '.mp3';
        $outputPath = storage_path('app/public/tts/' . $fileName);

        // ディレクトリが存在しない場合は作成
        if (!file_exists(dirname($outputPath))) {
            mkdir(dirname($outputPath), 0755, true);
        }

        file_put_contents($outputPath, $audioContent);

        return asset('storage/tts/' . $fileName);
    }
}
