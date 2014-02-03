<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'mnz');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'V3ufG0k1c');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'L_T)-[3C7Z2JKA?~fM0^Mh#`~-y,T@_hEvEGKpi,(&2Tk)LE3>,).Vkp8CzYN#6]');
define('SECURE_AUTH_KEY',  '8UtNrC`5wCP%)G67/,$^z.xmB,!r_gl?Ps[uur_h}s6$bk}scuAt5|Q= `a3qt{m');
define('LOGGED_IN_KEY',    '93@wgo@ls5OPIa_B5cDv1xu|hRz;[5.Cdf6-=NgR nX#_{Z <KSBUj*>v>bX(t1G');
define('NONCE_KEY',        '_C ivDt~|>tgEk}}1}4WlSe39P{+[C4MbT{}hO%Z&KUCTUzy).[~i%u6;,?1m.]g');
define('AUTH_SALT',        'C2I[v4uxkCbee2,pET#.o*_*lp_41%l,pG_8Rv4n6rm=|:tYHov ^svWlfG>KB9a');
define('SECURE_AUTH_SALT', 'IggYY|=/R2,y>w7-EfY3SL[)i8}|}%N@LMC0WVeIm#i4QNXUjNCH|p?!nE%~skm5');
define('LOGGED_IN_SALT',   'T$SBCX{8`R5rZ noa[GJq:k~:MaE(Kkb@%s~m!n$xMN<9dQw0w?/sUr<@|n/yg%_');
define('NONCE_SALT',       '`KS?zc];^Kt@m.FPb;>Cy)w(Ii!P/8v5/<}vv*>W1q~IxXR}/!8&%t? %nw#X/<3');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
