# 課題１ - PHP②-

## ①課題の内容（どんな作品）
- MVPのMVCの内、MとCの基礎を作り上げた。 Vは、テストに使える最低必要限度の機能に留めた。
  - ChatGPT及びチャットシステムと連動して動作するMとCの重要な機能及び基本データの新規・更新・削除ができる簡易Vを統合して動作させることができた。
  - この基礎ができたことにより、これよりChatGPTから目的に即したレスポンスを得るためのプロンプトのカイゼン作業を開始する準備が整った。
  - ![image](https://github.com/seimei-san/wip_dev_02/assets/53326909/a8783835-5a5a-46cb-b72e-bdebfa3f4e35)
  


## ②工夫した点・こだわった点
- フロントエンド・サーバーサイド（Laravelを活用してクライアント機能を提供するサーバー）において
  - Vについて、
    - LaravelのBladeでプルダウンボックスを実装することができた。
    - 不足してきた基本情報を管理するためのBladeを実装した。
      - 権限グループ　（追加、更新、削除）
      - チャットシステム　（追加、更新、削除）
      - 評価スコア　（表示のみ）
  - Mについて
    - MySQLに保存されている評価スコアを取得し表示できるようにした。
    - 各基本情報の管理画面に追加したプルダウンボックスに対象となるテーブルの情報を供給し選択できるようにした。
  - Cについて
- バックエンド・サーバーサイド（Phtyonを活用してSymphony（チャットシステム）とChatGPTと連携してメッセージの取得、分析、記録するサーバー）
  - チャットシステムから変えるHTMLタグ付きメッセージを正規表現でタグなし状態にし、ChatGPTにプロンプを投げられるようにした。
  - 指定のユーザーのメッセージのみをChatGPTによる分析の対象にする制御を実装した。

## ③難しかった点・次回トライしたいこと(又は機能)
- プルダウンボックスで、表示値で選択しキーを保存することができるようになったが、その結果の一覧表示においてキーが表示されている。　これを、表示値で表示することSQLを使わず、Laravelのモデルとコントローラーで実装しようと挑んだが、完成させることができなかった。
- チャットシステムから受け取るタグ付きメッセージから、プロンプトに最適な状態を保ちながらタグを取り除く方法の試行錯誤でかなりの時間を要した。
- ユーザーの基礎情報と、当該アプリ上で必要となるAttributeの切り分け方法が定まらず、Migrate：Refeshを多用せざるを得なかった
  
## ④質問・疑問・感想、シェアしたいtips等なんでも
[質問]
- 

[疑問]　
- 大量のチャットメッセージを処理するために、PythonのThreadを活用する必要があると考えるが、どのごうに実装すれば良いかまだ分からない。

[感想]　
  -
[tips]　
  - 
[参考記事]
