<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'aluraintercambios' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4k%qG6,A}dYSFOP^,P(C@#.rS6`-VO1KowL+,L^)Namy[]|<g+^+4>a85<~ii}5_' );
define( 'SECURE_AUTH_KEY',  '3I#>2B#)|{>_*lZI,fL;15a3`P0E:}c >smjE>m6BKmx(5yUk#L=ZsBqyZGan#4H' );
define( 'LOGGED_IN_KEY',    '?4>2}&y}ISg(ELU]~3Q24BU1G,-%m_:FK59D}<QYp`zc#W_2WW.7|ZM;%(fC!c34' );
define( 'NONCE_KEY',        'LvX,*cn* +ln8C1))SC{>rftw4As$t/W3>Mii$bND*12 Z2JHDysGS#N*bS)-~Zl' );
define( 'AUTH_SALT',        '$.Pa_Nx%r=m2bSQ@8DVPAK}DJKgpsH5SFf8`)oLE|O;vi BO}:UKY0;7LB@E*sH4' );
define( 'SECURE_AUTH_SALT', 'mV>jJT$H7n^ C1tAOWn4Ol4hG%ux~x/nnY/QrKqa6IvI>PRAg_n}V]d5h/ukMOBM' );
define( 'LOGGED_IN_SALT',   '^DL-B)JTF;i~r 6R7n=`Ylfs:T@Gy;zq1}Zm5`8Z~%uf[7)RQ:i,Dymn8ifI48z`' );
define( 'NONCE_SALT',       '~z%BC6!)+iH(w*O>|D)|VJk1}293~$V3wwQV~c^F`$+0h|HGZ+k98c$EOp8GOUbA' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
