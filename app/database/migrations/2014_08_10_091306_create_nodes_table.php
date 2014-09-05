<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNodesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('slug')->nullable()->index();
            $table->smallInteger('parent_node')->nullable()->index();
            $table->text('description')->nullable();
            $table->integer('topic_count')->default(0)->index();
            $table->timestamps();
        });

        $this->initializeNodes();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nodes');
    }

    public function initializeNodes()
    {
        DB::table('nodes')->truncate();
        $node_array = [
            'PHP' => [
                'php' => [
                    'slug' => 'php',
                    'description' => 'PHP（PHP: Hypertext Preprocessor 的縮寫，中文名：“PHP：超文本預處理器”）是一種通用開源腳本語言。',
                ],
                'Laravel' => [
                    'slug' => 'laravel',
                    'description' => 'Laravel是一套簡潔、優雅的 PHP Web 開發框架(PHP Web Framework)。它可以讓你從像麵條一樣雜亂的程式碼中解脫出來；它可以幫你構建一個完美的網路應用程式，而且每行程式碼都可以簡潔、富於表達力。',
                ],
                'Composer & Packagist' => [
                    'slug' => 'composer-and-packagist',
                    'description' => 'Composer[1] 是PHP中用來管理依賴（dependency）關係的工具。你可以在自己的項目中聲明所依賴的外部工具庫（libraries），Composer 會幫你安裝這些依賴的庫檔案。',
                ],
                '重構' => [
                    'slug' => 'refactoring',
                    'description' => '由於軟體發展本身不可能是完美的，因此改進的過程是持續且必然的，重構的方式將作為改善軟體設計的一種手段和方式，更加地擁有現實意義。',
                ],
                '設計模式' => [
                    'slug' => 'design-pattern',
                    'description' => '設計模式（Design pattern）是一套被反覆使用、多數人知曉的、經過分類編目的、程式碼設計經驗的總結。使用設計模式是為了可重用程式碼、讓程式碼更容易被他人理解、保證程式碼可靠性。',
                ],
                'Testing' => [
                    'slug' => 'testing',
                    'description' => '軟體測試（software testing），描述一種用來促進鑒定軟體的正確性、完整性、安全性和品質的過程。',
                ],
                '部署' => [
                    'slug' => 'deployment',
                    'description' => '',
                ],
                '開源項目' => [
                    'slug' => 'opensource-project',
                    'description' => '',
                ],
            ],
            'Web 開發' => [
                'MySQL' => [
                    'slug' => 'mysql',
                    'description' => 'MySQL 是一個關係型資料庫管理系統，由瑞典 MySQL AB 公司開發，目前屬於 Oracle 公司。',
                ],
                'Database' => [
                    'slug' => 'database',
                    'description' => '資料庫（Database）是按照資料結構來組織、存儲和管理數據的倉庫',
                ],
                'Git' => [
                    'slug' => 'git',
                    'description' => 'Git 是一個開源的分散式版本控制系統，用以有效、高速的處理從很小到非常大的項目版本管理。',
                ],
                'Linux' => [
                    'slug' => 'linux',
                    'description' => 'Linux 是一種自由和開放源碼的類 Unix 操作系統，存在著許多不同的 Linux 版本，但它們都使用了 Linux 核心。',
                ],
                'WebServer' => [
                    'slug' => 'web-server',
                    'description' => 'WEB 伺服器也稱為 WWW (WORLD WIDE WEB) 伺服器，主要功能是提供網上信息瀏覽服務。常見的有 Nginx, Apache..',
                ],
                '演算法' => [
                    'slug' => 'algrithm',
                    'description' => '演算法（Algorithm）是指解題方案的準確而完整的描述，是一系列解決問題的清晰指令，演算法代表著用系統的方法描述解決問題的策略機制。',
                ],
                '營運' => [
                    'slug' => 'operations',
                    'description' => '',
                ],
                '安全' => [
                    'slug' => 'security',
                    'description' => '',
                ],
                '雲端服務' => [
                    'slug' => 'cloud-service',
                    'description' => '雲端服務開發這一概念包含幾種不同的開發類型 - 軟體即服務(SaaS), 平台即服務(PaaS), Web 服務, 隨選 (on—demand) 運算',
                ],
            ],
            'Mobile' => [
                'iPhone' => [
                    'slug' => 'iphone-development',
                    'description' => 'iPhone 開發',
                ],
                'Android' => [
                    'slug' => 'android-development',
                    'description' => 'Android 開發',
                ],
            ],
            'Languages' => [
                'JavaScript' => [
                    'slug' => 'javascript',
                    'description' => 'JavaScript 是一種基于對象和事件驅動並具有相對安全性的客戶端腳本語言。',
                ],
                'Ruby' => [
                    'slug' => 'ruby',
                    'description' => 'Ruby，一種為簡單快捷的面向對象編程（面向對象程序設計）而創的腳本語言',
                ],
                'Python' => [
                    'slug' => 'python',
                    'description' => 'Python, 是一種面向對象、直譯式計算機程序設計語言',
                ],
                'GoLang' => [
                    'slug' => 'golang',
                    'description' => 'Go 語言是谷歌推出的一種全新的編程語言，可以在不損失應用程序性能的情況下降低程式碼的複雜性。',
                ],
                'Erlang' => [
                    'slug' => 'erlang',
                    'description' => 'Erlang 是一種通用的面向並發的編程語言，它由瑞典電信設備製造商愛立信所轄的 CS-Lab 開發，目的是創造一種可以應對大規模並發活動的編程語言和運行環境。',
                ],
            ],
            '社群' => [
                '公告' => [
                    'slug' => 'announcement',
                    'description' => '',
                ],
                '反饋' => [
                    'slug' => 'feedback',
                    'description' => '對於社群的優化或者 bug report , 可以在此分類下提',
                ],
                '社群開發' => [
                    'slug' => 'community-development',
                    'description' => '構建此社群軟體的開發討論分類',
                ],
                '實體聚會' => [
                    'slug' => 'gathering',
                    'description' => '',
                ],
            ],
            '分享' => [
                '健康' => [
                    'slug' => 'health',
                    'description' => '',
                ],
                '工具' => [
                    'slug' => 'toolings',
                    'description' => '使用工具, 是人類文明的標誌',
                ],
                '其他' => [
                    'slug' => 'other-share',
                    'description' => '抱歉, 如果你分享的話題不屬於其他分類的話, 只能選擇這裡了. ',
                ],
                '書籍' => [
                    'slug' => 'book-share',
                    'description' => '書籍是知識載體, 讓我們一起站在巨人的肩膀上. ',
                ],
                '求職' => [
                    'slug' => 'request-a-job',
                    'description' => '介紹下你自己, 讓大家幫你找到一份好的工作',
                ],
                '招聘' => [
                    'slug' => 'hire',
                    'description' => '這裡有高品質的 PHPer, 記得認真填寫你的需求, 薪資待遇是必須寫的哦.',
                ],
                '創業' => [
                    'slug' => 'start-up',
                    'description' => '',
                ],
                '移民' => [
                    'slug' => 'immigration',
                    'description' => '',
                ],
            ]
        ];

        $top_nodes = array();
        foreach ($node_array as $key => $value) {
            $top_nodes[] = [
                'name' => $key
            ];
        }
        DB::table('nodes')->insert( $top_nodes );

        $nodes = array();
        foreach ($node_array as $key => $value) {
            $top_node = Node::where('name','=',$key)->first();

            foreach ($value as $snode => $svalue) {
                $nodes[] = [
                    'parent_node' => $top_node->id,
                    'name' => $snode,
                    'slug' => $svalue['slug'],
                    'description' => $svalue['description'],
                ];
            }
        }
        DB::table('nodes')->insert( $nodes );
    }

}
