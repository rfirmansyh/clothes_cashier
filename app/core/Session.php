<?php
    class Session {
        public static function set($sessionId, $data) {
            $_SESSION["$sessionId"] = [$data];
        }

        public static function add($sessionId, $data) {
            $_SESSION["$sessionId"][] = $data;
            // array_merge($_SESSION["$sessionId"], $data);
        }

        public static function update($sessionId, $key, $data) {
            $_SESSION["$sessionId"]["$key"] = $data;
        }

        public static function get($sessionId) {
            return isset($_SESSION["$sessionId"]) ? $_SESSION["$sessionId"] : false;
        }

        public static function getwhere($sessionId, $keyToFind, $valueOfKey) {
            foreach($_SESSION["$sessionId"] as $currentSession) {
                if ( $currentSession["$keyToFind"] === $valueOfKey ) {
                    return $currentSession;
                }
            }
        }

        public static function count($sessionId) {
            return count($_SESSION["$sessionId"]);
        }
        
        public static function delete($sessionId) {
            unset($_SESSION["$sessionId"]);
        }
    }