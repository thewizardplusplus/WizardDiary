define(
	'ace/mode/wizard_diary',
	[
		'require',
		'exports',
		'module',
		'ace/lib/oop',
		'ace/mode/text',
		'ace/mode/behaviour/cstyle',
		'ace/mode/wizard_diary_highlight_rules'
	],
	function(require, exports, module) {
		var oop = require('../lib/oop');
		var text_mode = require('./text').Mode;
		var highlight_rules =
			require('./wizard_diary_highlight_rules')
			.WizardDiaryHighlightRules;
		var c_style_behaviour = require('./behaviour/cstyle').CstyleBehaviour;

		var mode = function() {
			this.HighlightRules = highlight_rules;
			this.$behaviour = new c_style_behaviour();
		};
		oop.inherits(mode, text_mode);
		(function() {
			this.$id = 'ace/mode/wizard_diary';
		}).call(mode.prototype);

		exports.Mode = mode;
	}
);
