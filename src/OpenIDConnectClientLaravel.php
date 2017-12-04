<?php
/**
 * Laravel sessions for OpenIDConnectClient
 */

namespace Jimbolino;

class OpenIDConnectClientLaravel extends OpenIDConnectClient
{
    protected static function setSession($key, $value)
    {
        session()->put($key, $value);
    }

    /**
     * Get somehting from the session
     * @param $key
     * @return mixed
     */
    protected static function getSession($key)
    {
        return session()->get($key);
    }

    /**
     * Remove (unset) something from the session
     * @param $key
     */
    protected static function unsetSession($key)
    {
        session()->forget($key);
    }

    /**
     * Start a session if it is not started yet
     */
    protected static function startSession()
    {
        // is automatically started
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
        session()->save();
        exit();
    }
}
