 <?
    /**@addtogroup ipscomponent
     * @{
     *
      *
     * @file          IPSComponentSwitch_1WireD2413.class.php
     * @author        Andreas Brauneis
     *
     *
     */

   /**
    * @class IPSComponentSwitch_1WireD2413
    *
    * Definiert ein IPSComponentSwitch_1WireD2413 Object, das ein IPSComponentSwitch Object f�r 1WireD2413 implementiert.
    *
    * @author Andreas Brauneis
    * @version
    * Version 2.50.1, 18.12.2012<br/>
    */

    IPSUtils_Include ('IPSComponentSwitch.class.php', 'IPSLibrary::app::core::IPSComponent::IPSComponentSwitch');

    class IPSComponentSwitch_1WireD2413 extends IPSComponentSwitch {

        private $instanceId;
        private $channelId;

        /**
         * @public
         *
         * Initialisierung eines IPSComponentSwitch_1WireD2413 Objektes
         *
         * @param integer $instanceId InstanceId des 1WireD2413 Devices
         * @param integer $channelId Kanal des 1WireD2413 Devices
         */
        public function __construct($instanceId, $channelId) {
            $this->instanceId = IPSUtil_ObjectIDByPath($instanceId);
            $this->channelId  = (int)$channelId;
        }

        /**
         * @public
         *
         * Funktion liefert String IPSComponent Constructor String.
         * String kann dazu ben�tzt werden, das Object mit der IPSComponent::CreateObjectByParams
         * wieder neu zu erzeugen.
         *
         * @return string Parameter String des IPSComponent Object
         */
        public function GetComponentParams() {
            return get_class($this).','.$this->instanceId.','.$this->channelId;
        }

        /**
         * @public
         *
         * Function um Events zu behandeln, diese Funktion wird vom IPSMessageHandler aufgerufen, um ein aufgetretenes Event
         * an das entsprechende Module zu leiten.
         *
         * @param integer $variable ID der ausl�senden Variable
         * @param string $value Wert der Variable
         * @param IPSModuleSwitch $module Module Object an das das aufgetretene Event weitergeleitet werden soll
         */
        public function HandleEvent($variable, $value, IPSModuleSwitch $module){
            $module->SyncState($value, $this);
        }

        /**
         * @public
         *
         * Zustand Setzen
         *
         * @param boolean $value Wert f�r Schalter
         */
        public function SetState($value) {
           TMEX_F3A_SetPin($this->instanceId, $this->channelId, $value);
        }

        /**
         * @public
         *
         * Liefert aktuellen Zustand
         *
         * @return boolean aktueller Schaltzustand
         */
        public function GetState() {
            return null;
        }

    }

    /** @}*/
?> 