<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SearchController extends Controller
{
    public function result(Request $request)
    {
        $data = [];
        
        $items = null;

        if (!empty($request->keyword))
        {
            // 検索ワードを配列化して$paramsに格納　https://qiita.com/mpyw/items/a704cb900dfda0fc0331
            function extractKeywords(string $input, int $limit = -1): array
            {
                return preg_split('/[\p{Z}\p{Cc}]++/u', $input, $limit, PREG_SPLIT_NO_EMPTY);
            }
        
            $params=extractKeywords($request->keyword);
        
            // 1ページあたりの取得件数
            $maxResults = 5;
        
            // ページ番号（1ページ目の情報を取得）
            $startIndex = 0;  //欲しいページ番号-1 で設定
        
            // APIを発行するURLを生成
            $base_url = 'https://www.googleapis.com/books/v1/volumes?q=';
        
            // 配列で設定した検索条件をURLに追加
            foreach ($params as $key => $value) {
                $base_url .= $value.'+';
            }
        
            // 末尾につく「+」をいったん削除
            $params_url = substr($base_url, 0, -1);
        
            // 件数情報を設定
            $url = $params_url.'&maxResults='.$maxResults.'&startIndex='.$startIndex;
        
            $client = new Client();
        
            // GETでリクエスト実行
            $response = $client->request("GET", $url);
        
            $body = $response->getBody();
            
            // レスポンスのJSON形式を連想配列に変換
            $bodyArray = json_decode($body, true);
        
            // 書籍情報部分を取得
            $items = $bodyArray['items'];
        
            // レスポンスの中身を見る
            //dd($items);
        }

        $data = [
            'items' => $items,
            'keyword' => $request->keyword,
        ];

        return view('web.result', $data);
    }
}