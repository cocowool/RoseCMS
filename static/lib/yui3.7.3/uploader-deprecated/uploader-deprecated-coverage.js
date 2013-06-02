if (typeof _yuitest_coverage == "undefined"){
    _yuitest_coverage = {};
    _yuitest_coverline = function(src, line){
        var coverage = _yuitest_coverage[src];
        if (!coverage.lines[line]){
            coverage.calledLines++;
        }
        coverage.lines[line]++;
    };
    _yuitest_coverfunc = function(src, name, line){
        var coverage = _yuitest_coverage[src],
            funcId = name + ":" + line;
        if (!coverage.functions[funcId]){
            coverage.calledFunctions++;
        }
        coverage.functions[funcId]++;
    };
}
_yuitest_coverage["/build/uploader-deprecated/uploader-deprecated.js"] = {
    lines: {},
    functions: {},
    coveredLines: 0,
    calledLines: 0,
    coveredFunctions: 0,
    calledFunctions: 0,
    path: "/build/uploader-deprecated/uploader-deprecated.js",
    code: []
};
_yuitest_coverage["/build/uploader-deprecated/uploader-deprecated.js"].code=["YUI.add('uploader-deprecated', function(Y) {","","/**"," * Attention: this is the 3.4.1 `uploader` module has been deprecated in favor of a new "," * uploader with an HTML5 layer. Please refer to the new Uploader User Guide for migration "," * information."," * "," * This module uses Flash player transport to upload files to the server, with support for "," * file filtering, multiple file uploads and progress monitoring."," * @module uploader-deprecated"," * @deprecated"," */","	","var Event = Y.Event,","    Node = Y.Node;","","var SWFURL = Y.Env.cdn + \"uploader-deprecated/assets/uploader.swf\";","","/*"," * <p><strong><span style=\"color:#ff0000;\">Attention: this is the 3.4.1 uploader module, which has "," * been deprecated in favor of a new uploader with an HTML5 layer. Please refer to the new "," * Uploader User Guide for migration information.</span></strong></p>"," * <p>The Uploader widget is a tool for uploading files to the server.</p>"," * @module uploader-deprecated"," * @title Uploader"," * @requires base, node, event, swf"," */","","/*"," * <p><strong><span style=\"color:#ff0000;\">Attention: this is the 3.4.1 uploader module, which has "," * been deprecated in favor of a new uploader with an HTML5 layer. Please refer to the new "," * Uploader User Guide for migration information.</span></strong></p>"," * <p>Creates the Uploader instance and keeps the initialization data.</p>"," *"," * @class Uploader"," * @extends Y.Base"," * @constructor"," * @param {Object} config (optional) Configuration parameters for the Uploader. The following parameters are available:"," *        <dl>"," *          <dt>boundingBox : String|Node (required)</dt>"," *          <dd></dd>"," *          <dt>buttonSkin : String (optional)</dt>"," *          <dd></dd>"," *          <dt>transparent : String (optional)</dt>"," *          <dd></dd>"," *          <dt>swfURL : String (optional)</dt>"," *          <dd></dd>"," *        </dl>"," * @deprecated"," */","				","function Uploader (config /*Object*/) {","	","	Uploader.superclass.constructor.apply(this, arguments);","","	if (config.hasOwnProperty(\"boundingBox\")) {","		this.set(\"boundingBox\", config.boundingBox);","	};","","	if (config.hasOwnProperty(\"buttonSkin\")) {","		this.set(\"buttonSkin\", config.buttonSkin);","	};","	if (config.hasOwnProperty(\"transparent\")) {","		this.set(\"transparent\", config.transparent);","	};","	if (config.hasOwnProperty(\"swfURL\")) {","		this.set(\"swfURL\", config.swfURL);","	};","};","","","Y.extend(Uploader, Y.Base, {","	","   /*","    * The reference to the instance of Y.SWF that encapsulates the instance of the Flash player with uploader logic.","    *","    * @private","    * @property uploaderswf","    * @type {SWF}","    * @default null","    * @deprecated","    */","	uploaderswf:null,","","   /*","    * The id of this instance of uploader.","    *","    * @private","    * @property _id","    * @type {String}","    * @deprecated","    */","	_id:\"\",","","   /*","    * Construction logic executed during Uploader instantiation.","    *","    * @method initializer","    * @protected","    * @deprecated","    */","	initializer : function () {","		","	this._id = Y.guid(\"uploader\");","    var oElement = Node.one(this.get(\"boundingBox\"));","","	var params = {version: \"10.0.45\",","  	          	  fixedAttributes: {allowScriptAccess:\"always\", allowNetworking:\"all\", scale: \"noscale\"},","	              flashVars: {}};","","	if (this.get(\"buttonSkin\") != \"\") {","		params.flashVars[\"buttonSkin\"] = this.get(\"buttonSkin\");","	}","	if (this.get(\"transparent\")) {","		params.fixedAttributes[\"wmode\"] = \"transparent\";","	}","","    this.uploaderswf = new Y.SWF(oElement, this.get(\"swfURL\"), params);","","	var upswf = this.uploaderswf;","	var relEvent = Y.bind(this._relayEvent, this);","","	/*","	* Announces that the uploader is ready and available for calling methods","	* and setting properties","	*","	* @event uploaderReady","	* @param event {Event} The event object for the uploaderReady.","    * @deprecated","    */","	upswf.on (\"swfReady\", Y.bind(this._initializeUploader, this));","	","	/*","	* Fired when the mouse button is clicked on the Uploader's 'Browse' button.","	*","	* @event click","	* @param event {Event} The event object for the click.","    * @deprecated","    */","	upswf.on (\"click\", relEvent);","","	/*","	* Fires when the user has finished selecting a set of files to be uploaded.","	*","	* @event fileselect","	* @param event {Event} The event object for the fileSelect.","	*  <dl>","	*      <dt>fileList</dt>","	*          <dd>The file list Object with entries in the following format: ","	               fileList[fileID] = {id: fileID, name: fileName, cDate: fileCDate, mDate: fileMDate, size: fileSize}</dd>","	*  </dl>","    * @deprecated","    */","	upswf.on (\"fileselect\", relEvent);","","	/*","	* Fired when the mouse button is pressed on the Uploader's 'Browse' button.","	*","	* @event mousedown","	* @param event {Event} The event object for the mousedown.","    * @deprecated","    */","	upswf.on (\"mousedown\", relEvent);","","	/*","	* Fired when the mouse button is raised on the Uploader's 'Browse' button.","	*","	* @event mouseup","	* @param event {Event} The event object for the mouseup.","    * @deprecated","    */","	upswf.on (\"mouseup\", relEvent);","","	/*","	* Fired when the mouse leaves the Uploader's 'Browse' button.","	*","	* @event mouseleave","	* @param event {Event} The event object for the mouseleave.","    * @deprecated","    */","	upswf.on (\"mouseleave\", relEvent);","","	/*","	* Fired when the mouse enters the Uploader's 'Browse' button.","	*","	* @event mouseenter","	* @param event {Event} The event object for the mouseenter.","    * @deprecated","    */","	upswf.on (\"mouseenter\", relEvent);","","	/*","	* Announces that the uploader is ready and available for calling methods","	* and setting properties","	*","	* @event uploadcancel","	* @param event {Event} The event object for the uploaderReady.","	*  <dl>","	*      <dt>ddEvent</dt>","	*          <dd><code>drag:start</code> event from the thumb</dd>","	*  </dl>","    * @deprecated","    */","	upswf.on (\"uploadcancel\", relEvent);","","	/*","	* Fires when a specific file's upload is cancelled.","	*","	* @event uploadcomplete","	* @param event {Event} The event object for the uploadcancel.","	*  <dl>","	*      <dt>id</dt>","	*          <dd>The id of the file whose upload has been cancelled.</dd>","	*  </dl>","    * @deprecated","    */","	upswf.on (\"uploadcomplete\", relEvent);","","	/*","	* If the server has sent a response to the file upload, this event is","	* fired and the response is added to its payload.","	*","	* @event uploadcompletedata","	* @param event {Event} The event object for the uploadcompletedata.","	*  <dl>","	*      <dt>id</dt>","	*          <dd>The id of the file for which the response is being provided.</dd>","	*      <dt>data</dt>","	*          <dd>The content of the server response.</dd>","	*  </dl>","    * @deprecated","    */","	upswf.on (\"uploadcompletedata\", relEvent);","","	/*","	* Provides error information if an error has occurred during the upload.","	*","	* @event uploaderror","	* @param event {Event} The event object for the uploadeerror.","	*  <dl>","	*      <dt>id</dt>","	*          <dd>The id of the file for which the upload error has occurred.</dd>","	*      <dt>status</dt>","	*          <dd>Relevant error information.</dd>","	*  </dl>","    * @deprecated","    */","	upswf.on (\"uploaderror\", relEvent);","","	/*","	* Provides progress information on a specific file upload.","	*","	* @event uploadprogress","	* @param event {Event} The event object for the uploadprogress.","	*  <dl>","	*      <dt>id</dt>","	*          <dd>The id of the file for which the progress information is being provided.</dd>","	*      <dt>bytesLoaded</dt>","	*          <dd>The number of bytes of the file that has been uploaded.</dd>","	*      <dt>bytesTotal</dt>","	*          <dd>The total number of bytes in the file that is being uploaded.</dd>","	*  </dl>","    * @deprecated","    */","	upswf.on (\"uploadprogress\", relEvent);","","	/*","	* Announces that the upload has been started for a specific file.","	*","	* @event uploadstart","	* @param event {Event} The event object for the uploadstart.","	*  <dl>","	*      <dt>id</dt>","	*          <dd>The id of the file whose upload has been started.</dd>","	*  </dl>","    * @deprecated","    */ ","	upswf.on (\"uploadstart\", relEvent);","	},","","   /*","    * Removes a specific file from the upload queue.","    *","    * @method removeFile","    * @param fileID {String} The ID of the file to be removed","    * @return {Object} The updated file list, which is an object of the format:","    * fileList[fileID] = {id: fileID, name: fileName, cDate: fileCDate, mDate: fileMDate, size: fileSize}","    * @deprecated","    */","	removeFile : function (fileID /*String*/) {","		return this.uploaderswf.callSWF(\"removeFile\", [fileID]);","	},","	","   /*","    * Clears the upload queue.","    *","    * @method clearFileList","    * @return {Boolean} This method always returns true.","    * @deprecated","    */","	clearFileList : function () {","		return this.uploaderswf.callSWF(\"clearFileList\", []);","	},","","   /*","    * Starts the upload of a specific file.","    *","    * @method upload","    * @param fileID {String} The ID of the file to be uploaded.","    * @param url {String} The URL to upload the file to.","    * @param method {String} (optional) The HTTP method to use for sending additional variables, either 'GET' or 'POST' ('GET' by default)","	* @param postVars {Object} (optional) A set of key-value pairs to send as variables along with the file upload HTTP request.","	* @param postFileVarName {String} (optional) The name of the POST variable that should contain the uploaded file ('Filedata' by default)","    * @return {Boolean} This method always returns true.","    * @deprecated","    */","	upload : function (fileID /*String*/, url /*String*/, method /*String*/, postVars /*Object*/, postFileVarName /*String*/) {","	    if (Y.Lang.isArray(fileID)) {","			return this.uploaderswf.callSWF(\"uploadThese\", [fileID, url, method, postVars, postFileVarName]);","		}","		else if (Y.Lang.isString(fileID)) {","			return this.uploaderswf.callSWF(\"upload\", [fileID, url, method, postVars, postFileVarName]);","			","		}","	},","","   /*","    * Starts the upload of a set of files, as specified in the first argument. ","    * The upload queue is managed automatically.","    *","    * @method uploadThese","    * @param fileIDs {Array} The array of IDs of the files to be uploaded.","    * @param url {String} The URL to upload the files to.","    * @param method {String} (optional) The HTTP method to use for sending additional variables, either 'GET' or 'POST' ('GET' by default)","	* @param postVars {Object} (optional) A set of key-value pairs to send as variables along with the file upload HTTP request.","	* @param postFileVarName {String} (optional) The name of the POST variable that should contain the uploaded file ('Filedata' by default)","    * @deprecated","    */","	uploadThese : function (fileIDs /*Array*/, url /*String*/, method /*String*/, postVars /*Object*/, postFileVarName /*String*/) {","		return this.uploaderswf.callSWF(\"uploadThese\", [fileIDs, url, method, postVars, postFileVarName]);","	},","","   /*","    * Starts the upload of the files in the upload queue. ","    * The upload queue is managed automatically.","    *","    * @method uploadAll","    * @param url {String} The URL to upload the files to.","    * @param method {String} (optional) The HTTP method to use for sending additional variables, either 'GET' or 'POST' ('GET' by default)","	* @param postVars {Object} (optional) A set of key-value pairs to send as variables along with the file upload HTTP request.","	* @param postFileVarName {String} (optional) The name of the POST variable that should contain the uploaded file ('Filedata' by default).","    * @deprecated","    */	","	uploadAll : function (url /*String*/, method /*String*/, postVars /*Object*/, postFileVarName /*String*/) {","		return this.uploaderswf.callSWF(\"uploadAll\", [url, method, postVars,postFileVarName]);","	},","","   /*","    * Cancels the upload of a specific file, if currently in progress.","    *","    * @method cancel","    * @param fileID {String} (optional) The ID of the file whose upload should be cancelled. If no ID is specified, all uploads are cancelled.","    * @deprecated","    */	","	cancel : function (fileID /*String*/) {","		return this.uploaderswf.callSWF(\"cancel\", [fileID]);","	},","","	/*","	 * @private","	 * Setter for the 'log' property.","	 * @method setAllowLogging","	 * @param value {Boolean} The value for the 'log' property.","     * @deprecated","	 */","	setAllowLogging : function (value /*Boolean*/) {","		this.uploaderswf.callSWF(\"setAllowLogging\", [value]);","	},","","	/*","	 * @private","	 * Setter for the 'multiFiles' property.","	 * @method setAllowMultipleFiles","	 * @param value {Boolean} The value for the 'multiFiles' property.","     * @deprecated","	 */","	setAllowMultipleFiles : function (value /*Boolean*/) {","		this.uploaderswf.callSWF(\"setAllowMultipleFiles\", [value]);","	},","","	/*","	 * @private","	 * Setter for the 'simLimit' property.","	 * @method setSimUploadLimit","	 * @param value {Boolean} The value for the 'simLimit' property.","     * @deprecated","	 */","	setSimUploadLimit : function (value /*int*/) {","		this.uploaderswf.callSWF(\"setSimUploadLimit\", [value]);","	},","","	/*","	 * @private","	 * Setter for the 'fileFilters' property.","	 * @method setFileFilters","	 * @param value {Boolean} The value for the 'fileFilters' property.","     * @deprecated","	 */	","	setFileFilters : function (fileFilters /*Array*/) {","		this.uploaderswf.callSWF(\"setFileFilters\", [fileFilters]);","	},","","   /*","    * Enables the uploader user input (mouse clicks on the 'Browse' button). If the button skin ","    * is applied, the sprite is reset from the \"disabled\" state.","    *","    * @method enable","    * @deprecated","    */	","	enable : function () {","		this.uploaderswf.callSWF(\"enable\");","	},","","   /*","    * Disables the uploader user input (mouse clicks on the 'Browse' button). If the button skin ","    * is applied, the sprite is set to the 'disabled' state.","    *","    * @method enable","    * @deprecated","    */	","	disable : function () {","		this.uploaderswf.callSWF(\"disable\");","	},","","	/*","	 * @private","	 * Called when the uploader SWF is initialized","	 * @method _initializeUploader","	 * @param event {Object} The event to be propagated from Flash.","     * @deprecated","	 */","	_initializeUploader: function (event) {","			this.publish(\"uploaderReady\", {fireOnce:true});","	     	this.fire(\"uploaderReady\", {});","	},","","	/*","	 * @private","	 * Called when an event is dispatched from Uploader","	 * @method _relayEvent","	 * @param event {Object} The event to be propagated from Flash.","     * @deprecated","	 */	","	_relayEvent: function (event) {","		    this.fire(event.type, event);","	},","	","	toString: function()","	{","		return \"Uploader \" + this._id;","	}","","},","{","	ATTRS: {","        /*","         * The flag that allows Flash player to ","         * output debug messages to its trace stack ","         * (if the Flash debug player is used).","         *","         * @attribute log","         * @type {Boolean}","         * @default false","         * @deprecated","         */","		log: {","			value: false,","			setter : \"setAllowLogging\"","		},","","        /*","         * The flag that allows the user to select","         * more than one files during the 'Browse'","         * dialog (using 'Shift' or 'Ctrl' keys).","         *","         * @attribute multiFiles","         * @type {Boolean}","         * @default false","         * @deprecated","         */","		multiFiles : {","			value: false,","			setter : \"setAllowMultipleFiles\"","		},","	","        /*","         * The number of files that can be uploaded","         * simultaneously if the automatic queue management","         * is used. This value can be in the range between 2","         * and 5.","         *","         * @attribute simLimit","         * @type {Number}","         * @default 2","         * @deprecated","         */","		simLimit : {","			value: 2,","			setter : \"setSimUploadLimit\"","		},","","        /*","         * The array of filters on file extensions for","         * the 'Browse' dialog. These filters only provide","         * convenience for the user and do not strictly","         * limit the selection to certain file extensions.","         * Each item in the array must contain a 'description'","         * property, and an 'extensions' property that must be","         * in the form \"*.ext;*.ext;*.ext;...\"","         *","         * @attribute fileFilters","         * @type {Array}","         * @default []","         * @deprecated","         */","		fileFilters : {","			value: [],","			setter : \"setFileFilters\"","		},","		","        /*","         * The Node containing the uploader's 'Browse' button.","         *","         * @attribute boundingBox","         * @type {Node}","         * @default null","         * @writeOnce","         * @deprecated","         */","		boundingBox : {","			value: null,","			writeOnce: 'initOnly'","		},","		","        /*","         * The URL of the image sprite for skinning the uploader's 'Browse' button.","         *","         * @attribute buttonSkin","         * @type {String}","         * @default null","         * @writeOnce","         * @deprecated","         */","		buttonSkin : {","			value: null,","			writeOnce: 'initOnly'","		},","		","        /*","         * The flag indicating whether the uploader is rendered ","         * with a transparent background.","         *","         * @attribute transparent","         * @type {Boolean}","         * @default true","         * @writeOnce","         * @deprecated","         */","		transparent : {","			value: true,","			writeOnce: 'initOnly'","		},","		","        /*","         * The URL of the uploader's SWF.","         *","         * @attribute swfURL","         * @type {String}","         * @default \"assets/uploader.swf\"","         * @writeOnce","         * @deprecated","         */","		swfURL : {","			value : SWFURL,","			writeOnce: 'initOnly'","		}","		","	}","}",");","Y.Uploader = Uploader;","","","}, '@VERSION@' ,{requires:['swf', 'base', 'node', 'event-custom']});"];
_yuitest_coverage["/build/uploader-deprecated/uploader-deprecated.js"].lines = {"1":0,"14":0,"17":0,"52":0,"54":0,"56":0,"57":0,"58":0,"60":0,"61":0,"62":0,"63":0,"64":0,"65":0,"66":0,"67":0,"68":0,"69":0,"72":0,"104":0,"105":0,"107":0,"111":0,"112":0,"114":0,"115":0,"118":0,"120":0,"121":0,"131":0,"140":0,"154":0,"163":0,"172":0,"181":0,"190":0,"204":0,"217":0,"233":0,"248":0,"265":0,"278":0,"291":0,"302":0,"318":0,"319":0,"321":0,"322":0,"340":0,"355":0,"366":0,"377":0,"388":0,"399":0,"410":0,"421":0,"432":0,"443":0,"444":0,"455":0,"460":0,"591":0};
_yuitest_coverage["/build/uploader-deprecated/uploader-deprecated.js"].functions = {"Uploader:52":0,"initializer:102":0,"removeFile:290":0,"clearFileList:301":0,"upload:317":0,"uploadThese:339":0,"uploadAll:354":0,"cancel:365":0,"setAllowLogging:376":0,"setAllowMultipleFiles:387":0,"setSimUploadLimit:398":0,"setFileFilters:409":0,"enable:420":0,"disable:431":0,"_initializeUploader:442":0,"_relayEvent:454":0,"toString:458":0,"(anonymous 1):1":0};
_yuitest_coverage["/build/uploader-deprecated/uploader-deprecated.js"].coveredLines = 62;
_yuitest_coverage["/build/uploader-deprecated/uploader-deprecated.js"].coveredFunctions = 18;
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 1);
YUI.add('uploader-deprecated', function(Y) {

/**
 * Attention: this is the 3.4.1 `uploader` module has been deprecated in favor of a new 
 * uploader with an HTML5 layer. Please refer to the new Uploader User Guide for migration 
 * information.
 * 
 * This module uses Flash player transport to upload files to the server, with support for 
 * file filtering, multiple file uploads and progress monitoring.
 * @module uploader-deprecated
 * @deprecated
 */
	
_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "(anonymous 1)", 1);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 14);
var Event = Y.Event,
    Node = Y.Node;

_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 17);
var SWFURL = Y.Env.cdn + "uploader-deprecated/assets/uploader.swf";

/*
 * <p><strong><span style="color:#ff0000;">Attention: this is the 3.4.1 uploader module, which has 
 * been deprecated in favor of a new uploader with an HTML5 layer. Please refer to the new 
 * Uploader User Guide for migration information.</span></strong></p>
 * <p>The Uploader widget is a tool for uploading files to the server.</p>
 * @module uploader-deprecated
 * @title Uploader
 * @requires base, node, event, swf
 */

/*
 * <p><strong><span style="color:#ff0000;">Attention: this is the 3.4.1 uploader module, which has 
 * been deprecated in favor of a new uploader with an HTML5 layer. Please refer to the new 
 * Uploader User Guide for migration information.</span></strong></p>
 * <p>Creates the Uploader instance and keeps the initialization data.</p>
 *
 * @class Uploader
 * @extends Y.Base
 * @constructor
 * @param {Object} config (optional) Configuration parameters for the Uploader. The following parameters are available:
 *        <dl>
 *          <dt>boundingBox : String|Node (required)</dt>
 *          <dd></dd>
 *          <dt>buttonSkin : String (optional)</dt>
 *          <dd></dd>
 *          <dt>transparent : String (optional)</dt>
 *          <dd></dd>
 *          <dt>swfURL : String (optional)</dt>
 *          <dd></dd>
 *        </dl>
 * @deprecated
 */
				
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 52);
function Uploader (config /*Object*/) {
	
	_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "Uploader", 52);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 54);
Uploader.superclass.constructor.apply(this, arguments);

	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 56);
if (config.hasOwnProperty("boundingBox")) {
		_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 57);
this.set("boundingBox", config.boundingBox);
	}_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 58);
;

	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 60);
if (config.hasOwnProperty("buttonSkin")) {
		_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 61);
this.set("buttonSkin", config.buttonSkin);
	}_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 62);
;
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 63);
if (config.hasOwnProperty("transparent")) {
		_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 64);
this.set("transparent", config.transparent);
	}_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 65);
;
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 66);
if (config.hasOwnProperty("swfURL")) {
		_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 67);
this.set("swfURL", config.swfURL);
	}_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 68);
;
}_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 69);
;


_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 72);
Y.extend(Uploader, Y.Base, {
	
   /*
    * The reference to the instance of Y.SWF that encapsulates the instance of the Flash player with uploader logic.
    *
    * @private
    * @property uploaderswf
    * @type {SWF}
    * @default null
    * @deprecated
    */
	uploaderswf:null,

   /*
    * The id of this instance of uploader.
    *
    * @private
    * @property _id
    * @type {String}
    * @deprecated
    */
	_id:"",

   /*
    * Construction logic executed during Uploader instantiation.
    *
    * @method initializer
    * @protected
    * @deprecated
    */
	initializer : function () {
		
	_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "initializer", 102);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 104);
this._id = Y.guid("uploader");
    _yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 105);
var oElement = Node.one(this.get("boundingBox"));

	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 107);
var params = {version: "10.0.45",
  	          	  fixedAttributes: {allowScriptAccess:"always", allowNetworking:"all", scale: "noscale"},
	              flashVars: {}};

	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 111);
if (this.get("buttonSkin") != "") {
		_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 112);
params.flashVars["buttonSkin"] = this.get("buttonSkin");
	}
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 114);
if (this.get("transparent")) {
		_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 115);
params.fixedAttributes["wmode"] = "transparent";
	}

    _yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 118);
this.uploaderswf = new Y.SWF(oElement, this.get("swfURL"), params);

	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 120);
var upswf = this.uploaderswf;
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 121);
var relEvent = Y.bind(this._relayEvent, this);

	/*
	* Announces that the uploader is ready and available for calling methods
	* and setting properties
	*
	* @event uploaderReady
	* @param event {Event} The event object for the uploaderReady.
    * @deprecated
    */
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 131);
upswf.on ("swfReady", Y.bind(this._initializeUploader, this));
	
	/*
	* Fired when the mouse button is clicked on the Uploader's 'Browse' button.
	*
	* @event click
	* @param event {Event} The event object for the click.
    * @deprecated
    */
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 140);
upswf.on ("click", relEvent);

	/*
	* Fires when the user has finished selecting a set of files to be uploaded.
	*
	* @event fileselect
	* @param event {Event} The event object for the fileSelect.
	*  <dl>
	*      <dt>fileList</dt>
	*          <dd>The file list Object with entries in the following format: 
	               fileList[fileID] = {id: fileID, name: fileName, cDate: fileCDate, mDate: fileMDate, size: fileSize}</dd>
	*  </dl>
    * @deprecated
    */
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 154);
upswf.on ("fileselect", relEvent);

	/*
	* Fired when the mouse button is pressed on the Uploader's 'Browse' button.
	*
	* @event mousedown
	* @param event {Event} The event object for the mousedown.
    * @deprecated
    */
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 163);
upswf.on ("mousedown", relEvent);

	/*
	* Fired when the mouse button is raised on the Uploader's 'Browse' button.
	*
	* @event mouseup
	* @param event {Event} The event object for the mouseup.
    * @deprecated
    */
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 172);
upswf.on ("mouseup", relEvent);

	/*
	* Fired when the mouse leaves the Uploader's 'Browse' button.
	*
	* @event mouseleave
	* @param event {Event} The event object for the mouseleave.
    * @deprecated
    */
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 181);
upswf.on ("mouseleave", relEvent);

	/*
	* Fired when the mouse enters the Uploader's 'Browse' button.
	*
	* @event mouseenter
	* @param event {Event} The event object for the mouseenter.
    * @deprecated
    */
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 190);
upswf.on ("mouseenter", relEvent);

	/*
	* Announces that the uploader is ready and available for calling methods
	* and setting properties
	*
	* @event uploadcancel
	* @param event {Event} The event object for the uploaderReady.
	*  <dl>
	*      <dt>ddEvent</dt>
	*          <dd><code>drag:start</code> event from the thumb</dd>
	*  </dl>
    * @deprecated
    */
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 204);
upswf.on ("uploadcancel", relEvent);

	/*
	* Fires when a specific file's upload is cancelled.
	*
	* @event uploadcomplete
	* @param event {Event} The event object for the uploadcancel.
	*  <dl>
	*      <dt>id</dt>
	*          <dd>The id of the file whose upload has been cancelled.</dd>
	*  </dl>
    * @deprecated
    */
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 217);
upswf.on ("uploadcomplete", relEvent);

	/*
	* If the server has sent a response to the file upload, this event is
	* fired and the response is added to its payload.
	*
	* @event uploadcompletedata
	* @param event {Event} The event object for the uploadcompletedata.
	*  <dl>
	*      <dt>id</dt>
	*          <dd>The id of the file for which the response is being provided.</dd>
	*      <dt>data</dt>
	*          <dd>The content of the server response.</dd>
	*  </dl>
    * @deprecated
    */
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 233);
upswf.on ("uploadcompletedata", relEvent);

	/*
	* Provides error information if an error has occurred during the upload.
	*
	* @event uploaderror
	* @param event {Event} The event object for the uploadeerror.
	*  <dl>
	*      <dt>id</dt>
	*          <dd>The id of the file for which the upload error has occurred.</dd>
	*      <dt>status</dt>
	*          <dd>Relevant error information.</dd>
	*  </dl>
    * @deprecated
    */
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 248);
upswf.on ("uploaderror", relEvent);

	/*
	* Provides progress information on a specific file upload.
	*
	* @event uploadprogress
	* @param event {Event} The event object for the uploadprogress.
	*  <dl>
	*      <dt>id</dt>
	*          <dd>The id of the file for which the progress information is being provided.</dd>
	*      <dt>bytesLoaded</dt>
	*          <dd>The number of bytes of the file that has been uploaded.</dd>
	*      <dt>bytesTotal</dt>
	*          <dd>The total number of bytes in the file that is being uploaded.</dd>
	*  </dl>
    * @deprecated
    */
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 265);
upswf.on ("uploadprogress", relEvent);

	/*
	* Announces that the upload has been started for a specific file.
	*
	* @event uploadstart
	* @param event {Event} The event object for the uploadstart.
	*  <dl>
	*      <dt>id</dt>
	*          <dd>The id of the file whose upload has been started.</dd>
	*  </dl>
    * @deprecated
    */ 
	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 278);
upswf.on ("uploadstart", relEvent);
	},

   /*
    * Removes a specific file from the upload queue.
    *
    * @method removeFile
    * @param fileID {String} The ID of the file to be removed
    * @return {Object} The updated file list, which is an object of the format:
    * fileList[fileID] = {id: fileID, name: fileName, cDate: fileCDate, mDate: fileMDate, size: fileSize}
    * @deprecated
    */
	removeFile : function (fileID /*String*/) {
		_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "removeFile", 290);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 291);
return this.uploaderswf.callSWF("removeFile", [fileID]);
	},
	
   /*
    * Clears the upload queue.
    *
    * @method clearFileList
    * @return {Boolean} This method always returns true.
    * @deprecated
    */
	clearFileList : function () {
		_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "clearFileList", 301);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 302);
return this.uploaderswf.callSWF("clearFileList", []);
	},

   /*
    * Starts the upload of a specific file.
    *
    * @method upload
    * @param fileID {String} The ID of the file to be uploaded.
    * @param url {String} The URL to upload the file to.
    * @param method {String} (optional) The HTTP method to use for sending additional variables, either 'GET' or 'POST' ('GET' by default)
	* @param postVars {Object} (optional) A set of key-value pairs to send as variables along with the file upload HTTP request.
	* @param postFileVarName {String} (optional) The name of the POST variable that should contain the uploaded file ('Filedata' by default)
    * @return {Boolean} This method always returns true.
    * @deprecated
    */
	upload : function (fileID /*String*/, url /*String*/, method /*String*/, postVars /*Object*/, postFileVarName /*String*/) {
	    _yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "upload", 317);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 318);
if (Y.Lang.isArray(fileID)) {
			_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 319);
return this.uploaderswf.callSWF("uploadThese", [fileID, url, method, postVars, postFileVarName]);
		}
		else {_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 321);
if (Y.Lang.isString(fileID)) {
			_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 322);
return this.uploaderswf.callSWF("upload", [fileID, url, method, postVars, postFileVarName]);
			
		}}
	},

   /*
    * Starts the upload of a set of files, as specified in the first argument. 
    * The upload queue is managed automatically.
    *
    * @method uploadThese
    * @param fileIDs {Array} The array of IDs of the files to be uploaded.
    * @param url {String} The URL to upload the files to.
    * @param method {String} (optional) The HTTP method to use for sending additional variables, either 'GET' or 'POST' ('GET' by default)
	* @param postVars {Object} (optional) A set of key-value pairs to send as variables along with the file upload HTTP request.
	* @param postFileVarName {String} (optional) The name of the POST variable that should contain the uploaded file ('Filedata' by default)
    * @deprecated
    */
	uploadThese : function (fileIDs /*Array*/, url /*String*/, method /*String*/, postVars /*Object*/, postFileVarName /*String*/) {
		_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "uploadThese", 339);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 340);
return this.uploaderswf.callSWF("uploadThese", [fileIDs, url, method, postVars, postFileVarName]);
	},

   /*
    * Starts the upload of the files in the upload queue. 
    * The upload queue is managed automatically.
    *
    * @method uploadAll
    * @param url {String} The URL to upload the files to.
    * @param method {String} (optional) The HTTP method to use for sending additional variables, either 'GET' or 'POST' ('GET' by default)
	* @param postVars {Object} (optional) A set of key-value pairs to send as variables along with the file upload HTTP request.
	* @param postFileVarName {String} (optional) The name of the POST variable that should contain the uploaded file ('Filedata' by default).
    * @deprecated
    */	
	uploadAll : function (url /*String*/, method /*String*/, postVars /*Object*/, postFileVarName /*String*/) {
		_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "uploadAll", 354);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 355);
return this.uploaderswf.callSWF("uploadAll", [url, method, postVars,postFileVarName]);
	},

   /*
    * Cancels the upload of a specific file, if currently in progress.
    *
    * @method cancel
    * @param fileID {String} (optional) The ID of the file whose upload should be cancelled. If no ID is specified, all uploads are cancelled.
    * @deprecated
    */	
	cancel : function (fileID /*String*/) {
		_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "cancel", 365);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 366);
return this.uploaderswf.callSWF("cancel", [fileID]);
	},

	/*
	 * @private
	 * Setter for the 'log' property.
	 * @method setAllowLogging
	 * @param value {Boolean} The value for the 'log' property.
     * @deprecated
	 */
	setAllowLogging : function (value /*Boolean*/) {
		_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "setAllowLogging", 376);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 377);
this.uploaderswf.callSWF("setAllowLogging", [value]);
	},

	/*
	 * @private
	 * Setter for the 'multiFiles' property.
	 * @method setAllowMultipleFiles
	 * @param value {Boolean} The value for the 'multiFiles' property.
     * @deprecated
	 */
	setAllowMultipleFiles : function (value /*Boolean*/) {
		_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "setAllowMultipleFiles", 387);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 388);
this.uploaderswf.callSWF("setAllowMultipleFiles", [value]);
	},

	/*
	 * @private
	 * Setter for the 'simLimit' property.
	 * @method setSimUploadLimit
	 * @param value {Boolean} The value for the 'simLimit' property.
     * @deprecated
	 */
	setSimUploadLimit : function (value /*int*/) {
		_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "setSimUploadLimit", 398);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 399);
this.uploaderswf.callSWF("setSimUploadLimit", [value]);
	},

	/*
	 * @private
	 * Setter for the 'fileFilters' property.
	 * @method setFileFilters
	 * @param value {Boolean} The value for the 'fileFilters' property.
     * @deprecated
	 */	
	setFileFilters : function (fileFilters /*Array*/) {
		_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "setFileFilters", 409);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 410);
this.uploaderswf.callSWF("setFileFilters", [fileFilters]);
	},

   /*
    * Enables the uploader user input (mouse clicks on the 'Browse' button). If the button skin 
    * is applied, the sprite is reset from the "disabled" state.
    *
    * @method enable
    * @deprecated
    */	
	enable : function () {
		_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "enable", 420);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 421);
this.uploaderswf.callSWF("enable");
	},

   /*
    * Disables the uploader user input (mouse clicks on the 'Browse' button). If the button skin 
    * is applied, the sprite is set to the 'disabled' state.
    *
    * @method enable
    * @deprecated
    */	
	disable : function () {
		_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "disable", 431);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 432);
this.uploaderswf.callSWF("disable");
	},

	/*
	 * @private
	 * Called when the uploader SWF is initialized
	 * @method _initializeUploader
	 * @param event {Object} The event to be propagated from Flash.
     * @deprecated
	 */
	_initializeUploader: function (event) {
			_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "_initializeUploader", 442);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 443);
this.publish("uploaderReady", {fireOnce:true});
	     	_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 444);
this.fire("uploaderReady", {});
	},

	/*
	 * @private
	 * Called when an event is dispatched from Uploader
	 * @method _relayEvent
	 * @param event {Object} The event to be propagated from Flash.
     * @deprecated
	 */	
	_relayEvent: function (event) {
		    _yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "_relayEvent", 454);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 455);
this.fire(event.type, event);
	},
	
	toString: function()
	{
		_yuitest_coverfunc("/build/uploader-deprecated/uploader-deprecated.js", "toString", 458);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 460);
return "Uploader " + this._id;
	}

},
{
	ATTRS: {
        /*
         * The flag that allows Flash player to 
         * output debug messages to its trace stack 
         * (if the Flash debug player is used).
         *
         * @attribute log
         * @type {Boolean}
         * @default false
         * @deprecated
         */
		log: {
			value: false,
			setter : "setAllowLogging"
		},

        /*
         * The flag that allows the user to select
         * more than one files during the 'Browse'
         * dialog (using 'Shift' or 'Ctrl' keys).
         *
         * @attribute multiFiles
         * @type {Boolean}
         * @default false
         * @deprecated
         */
		multiFiles : {
			value: false,
			setter : "setAllowMultipleFiles"
		},
	
        /*
         * The number of files that can be uploaded
         * simultaneously if the automatic queue management
         * is used. This value can be in the range between 2
         * and 5.
         *
         * @attribute simLimit
         * @type {Number}
         * @default 2
         * @deprecated
         */
		simLimit : {
			value: 2,
			setter : "setSimUploadLimit"
		},

        /*
         * The array of filters on file extensions for
         * the 'Browse' dialog. These filters only provide
         * convenience for the user and do not strictly
         * limit the selection to certain file extensions.
         * Each item in the array must contain a 'description'
         * property, and an 'extensions' property that must be
         * in the form "*.ext;*.ext;*.ext;..."
         *
         * @attribute fileFilters
         * @type {Array}
         * @default []
         * @deprecated
         */
		fileFilters : {
			value: [],
			setter : "setFileFilters"
		},
		
        /*
         * The Node containing the uploader's 'Browse' button.
         *
         * @attribute boundingBox
         * @type {Node}
         * @default null
         * @writeOnce
         * @deprecated
         */
		boundingBox : {
			value: null,
			writeOnce: 'initOnly'
		},
		
        /*
         * The URL of the image sprite for skinning the uploader's 'Browse' button.
         *
         * @attribute buttonSkin
         * @type {String}
         * @default null
         * @writeOnce
         * @deprecated
         */
		buttonSkin : {
			value: null,
			writeOnce: 'initOnly'
		},
		
        /*
         * The flag indicating whether the uploader is rendered 
         * with a transparent background.
         *
         * @attribute transparent
         * @type {Boolean}
         * @default true
         * @writeOnce
         * @deprecated
         */
		transparent : {
			value: true,
			writeOnce: 'initOnly'
		},
		
        /*
         * The URL of the uploader's SWF.
         *
         * @attribute swfURL
         * @type {String}
         * @default "assets/uploader.swf"
         * @writeOnce
         * @deprecated
         */
		swfURL : {
			value : SWFURL,
			writeOnce: 'initOnly'
		}
		
	}
}
);
_yuitest_coverline("/build/uploader-deprecated/uploader-deprecated.js", 591);
Y.Uploader = Uploader;


}, '@VERSION@' ,{requires:['swf', 'base', 'node', 'event-custom']});
