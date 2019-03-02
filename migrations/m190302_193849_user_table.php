<?php

use yii\db\Migration;

/**
 * Class m190302_193849_user_table
 */
class m190302_193849_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {

        $this->createTable('{{%user}}',
            [
                'u_id' => $this->primaryKey(),
                'u_realname' => $this->string(128)->notNull(),
                'u_name' => $this->string(32)->notNull(),
                'u_password' => $this->string(32)->notNull()->defaultValue(''),
                'u_enc_password' => $this->string(64)->notNull()->defaultValue(''),
                'u_email' => $this->string(128),
                'u_mandant_id' => $this->integer()->notNull(),
                'u_anrede' => $this->string(32)->defaultValue(''),
                'u_telefon' => $this->string(64)->defaultValue(''),
                'u_geloescht' => $this->smallInteger(1)->defaultValue(0),
                'u_online' => $this->smallInteger(1)->defaultValue(0),
                'u_login' => $this->dateTime(),
                'u_level' => $this->smallInteger()->defaultValue(0),
                'u_admin' => $this->smallInteger(1)->defaultValue(0),
                'u_lang' => $this->string(60)->notNull()->defaultValue('de'),
                'u_lastvisit' => $this->dateTime(),
                'u_filter' => $this->string(196)->notNull()->defaultValue('')
            ]
        );

    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        echo "m190302_193849_user_table cannot be reverted.\n";

        return false;
    }

}
