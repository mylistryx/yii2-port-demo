<?php

use yii\db\Migration;

/**
 * Class m240212_191832_create_table_article_category
 */
class m240212_191832_create_table_article_category extends Migration
{
    private string $table = '{{%article_category}}';
    private string $tableArticle = '{{%article}}';
    private string $tableCategory = '{{%category}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'article_id'  => $this->integer()->notNull()->comment('ID статьи'),
            'category_id' => $this->integer()->notNull()->comment('ID категории'),
        ]);

        $this->addPrimaryKey('PK_ArticleCategory', $this->table, ['article_id', 'category_id']);
        $this->addForeignKey('FK_ArticleCategory_ArticleId__Article_Id', $this->table, ['article_id'], $this->tableArticle, ['id'], 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_ArticleCategory_CategoryId__Category_Id', $this->table, ['category_id'], $this->tableCategory, ['id'], 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_ArticleCategory_ArticleId__Article_Id', $this->table);
        $this->dropForeignKey('FK_ArticleCategory_CategoryId__Category_Id', $this->table);
        $this->dropPrimaryKey('PK_ArticleCategory', $this->table);
        $this->dropTable($this->table);
    }
}
