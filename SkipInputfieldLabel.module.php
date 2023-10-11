<?php namespace ProcessWire;

class SkipInputfieldLabel extends Wire implements Module {

	public static function getModuleInfo() {
		return [
			'title' => 'Skip Inputfield Label',
			'summary' => 'Adds a skipLabel config option for inputfields.',
			'version' => '0.0.1',
			'author' => 'Teppo Koivula',
			'autoload' => true,
			'singular' => true,
		];
	}

	public function init() {
		$this->addHookAfter('Inputfield::getConfigInputfields', $this, 'skipLabelConfig');
	}

	protected function skipLabelConfig(HookEvent $event) {

		$skipLabelOptions = [
			Inputfield::skipLabelNo => $this->_('No'),
			Inputfield::skipLabelFor => $this->_('Don\'t use a "for" attribute with the <label>'),
			Inputfield::skipLabelHeader => $this->_('Don\'t show a visible header'),
			Inputfield::skipLabelBlank => $this->_('Skip rendering of the label when it is blank'),
			Inputfield::skipLabelMarkup => $this->_('Do not render any markup for the header/label at all'),
		];

		if ($event->object->skipLabel && !isset($skipLabelOptions[$event->object->skipLabel])) return;

		/** @var InputfieldSelect */
		$skipLabel = $event->modules->get('InputfieldSelect');
		$skipLabel->label = $this->_('Skip display of the label?');
		$skipLabel->name = 'skipLabel';
		$skipLabel->addOptions($skipLabelOptions);
		$skipLabel->collapsed = !$event->object->skipLabel ? Inputfield::collapsedYes : Inputfield::collapsedBlank;
		$skipLabel->icon = 'eye-slash';
		$skipLabel->value = $event->object->skipLabel;

		$event->return->add($skipLabel);
	}
}
