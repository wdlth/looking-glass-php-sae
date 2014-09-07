<?php
/**
 * SAE_Output Class
 *
 * Responsible for sending final output to browser
 * 输出类页面缓存类 for SAE
 *
 * @author ogopogo
 * @edit @月夜风KeN
 * 修正读取缓存时，返回数据问题
 */

class SAE_Output extends CI_Output
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Write a Cache File
     *
     * @access  public
     * @param   string
     * @return  void
     */
    function _write_cache($output)
    {
        $CI =& get_instance();
        $cache_adapter; //缓存适配器
        $cache_model = $CI->config->item('sae_output_cache'); //读取页面缓存方式

        switch ($cache_model){
            case '':
                log_message('error', 'Undefind $config[\'sae_output_cache\']');
                return FALSE;
                break;
            case 'kvdb':
                $CI->load->driver('cache');
                $cache_adapter = $CI->cache->kvdb;
                break;
            case 'memcache':
                $CI->load->driver('cache');
                $cache_adapter = $CI->cache->memcached;
                break;
        }
        if( !$cache_adapter->is_supported() )
        {
            log_message('error', "Unable to load cache: ".$cache_model);
            return;
        }

        $uri =  $CI->config->item('base_url') . $CI->config->item('index_page') . $CI->uri->uri_string();
        $cache_key = md5($uri);

        $cache_adapter->save($cache_key,$output, $this->cache_expiration * 60);
        log_message('debug', "Cache output in ".$cache_model . '. key: ' . $cache_key);
        //echo "Cache output in ".$cache_model . '. key: ' . $cache_key;
    }

    // --------------------------------------------------------------------

    /**
     * Update/serve a cached file
     *
     * @access  public
     * @param   object  config class
     * @param   object  uri class
     * @return  void
     */
    function _display_cache(&$CFG, &$URI)
    {
        $path = $CFG->item('cache_path');
        $prefixKey = ($path == '') ? 'system_cache_' : $path;

        $cache_adapter = null;
        $cache_model = $CFG->item('sae_output_cache');

        switch ($cache_model){
            case '':
                return FALSE;
                break;
            case 'kvdb':
                $cache_adapter = new SaeKV();
                $status = $cache_adapter->init();
                break;
            case 'memcache':
                $cache_adapter = memcache_init();
                $status = $cache_adapter;
                break;
        }

        if( !$status)
        {
            return FALSE;
        }

        $uri = $CFG->item('base_url') . $CFG->item('index_page') . $URI->uri_string;
        $cache_key = md5($uri);
        $cache = $cache_adapter->get($prefixKey.$cache_key);

        if ( $cache === FALSE )
        {
            //缓存已过期
            log_message('debug', "Cache has expired.");
            return FALSE;
        }
        else
        {
            if ($cache_model == 'kvdb')
            {
                $stored = unserialize($cache);
                if( $stored['ttl'] > 0 )
                {
                    if (time() > $stored['time'] + $stored['ttl'])
                    {
                        $cache_adapter->delete($prefixKey.$cache_key);
                        log_message('debug', "Cache has expired.");
                        return FALSE;
                    }
                }

                $cache = $stored['data'];
            }
            else if ($cache_model == 'memcache')
            {
                $cache = $cache[0];
            }

            //输出缓存
            log_message('debug', "Cache is current. Sending it to browser.");
            $this->_display($cache);
            return TRUE;
        }
    }
}
// End Class


/* End of file SAE_Output.php */
/* Location: ./application/core/SAE_Output.php */
