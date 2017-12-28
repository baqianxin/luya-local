<?php

use yii\db\Migration;

/**
 * Class m171228_021343_addressbool_basetables
 */
class m171228_021343_addressbool_basetables extends Migration {
    /**
     * @inheritdoc
     */
    public function safeUp(){

        $this->createTable('addressbook_contact', [

            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'salutation' => $this->string(),
            'firstname' => $this->string(),
            'lastname' => $this->string(),
            'street' => $this->string(),
            'zip' => $this->string(100),
            'city' => $this->string(),
            'country' => $this->string(),
            'email' => $this->string(),
            'notes' => $this->text(),

        ]);

        $this->createTable('addressbook_group', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown(){
        $this->dropTable('addressbook_contact');
        $this->dropTable('addressbook_group');
        echo "m171228_021343_addressbool_basetables cannot be reverted.\n";
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171228_021343_addressbool_basetables cannot be reverted.\n";

        return false;
    }
    */
}
