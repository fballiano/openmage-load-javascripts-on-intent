<?php
/**
 * @category   FBalliano
 * @package    FBalliano_LoadJavascriptsOnIntent
 * @copyright  Copyright (c) Fabrizio Balliano (http://fabrizioballiano.com)
 * @license    https://opensource.org/license/osl-3 Open Software License (OSL 3.0)
 */
class Fballiano_LoadJavascriptsOnIntent_Model_Observer
{
    public function httpResponseSendBefore(Varien_Event_Observer $observer)
    {
        $response = $observer->getResponse();
        $html = $response->getBody();

        $pattern = '/<script([^>]*?)>/iU';
        $html = preg_replace_callback($pattern, function($matches) {
            $newscript = str_replace([
                'type="text/javascript"',
                "type='text/javascript'"
            ], '', trim($matches[1]));

            return "<script {$newscript} type=\"text/plain\">";
        }, $html);

        $html .= '<script defer="true">
            const fbLoadScriptsEvents = ["click","keyup","mousemove","scroll","touchstart","wakeup","wheel"];
            let fbScriptsToLoad = [], fbInlineScripts = [];
            function FbLoadScripts(event) {
                fbLoadScriptsEvents.forEach(event=>{document.removeEventListener(event, FbLoadScripts)});
                document.querySelectorAll(\'script[type="text/plain"]\').forEach(script => {
                    if (Object.keys(script.dataset).length) return;
                    if (script.getAttribute("src")) {
                        fbScriptsToLoad++;
                        let newScript = document.createElement("script");
                        newScript.defer = true;
                        newScript.async = false;
                        newScript.src = script.getAttribute("src");
                        newScript.onload = function () {
                            fbScriptsToLoad--;
                            if (fbScriptsToLoad == 0) {
                                fbInlineScripts.forEach(inlineScript => {eval(inlineScript)});
                                window.dispatchEvent(new Event("DOMContentLoaded"));
                                window.dispatchEvent(new Event("load"));
                                window.dispatchEvent(new Event("onload"));
                            }
                        }
                        document.head.appendChild(newScript);
                    } else {
                        fbInlineScripts.push(script.textContent);
                    }
                });
            }
            fbLoadScriptsEvents.forEach(event=>{document.addEventListener(event, FbLoadScripts, {once:true,passive:true});});
        </script>';

        $response->setBody($html);
    }
}