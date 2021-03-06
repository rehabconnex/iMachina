<?

	class TextObjectAudioWav extends TextObject
	{
		var $textobjectType="audio"; 
    	var $textobjectTypeSub="wav";

    	function onInsert($app,$userId)
		{
			
			$textobjectViewTmp=$app->getTextObjectViewFor($this, $app, $userId );
			$this->textobjectTimeLength = $textobjectViewTmp->getDuration();
			drawWaveform($textobjectViewTmp->textobjectObject->textobjectArgumentText,'./audio/waveforms/waveform'.$textobjectViewTmp->getId().'.png');	
		}

		
		function onUpdate($app,$userId)
		{
			// textobjectTimeLength min length = audiofile length!
			$textobjectViewTmp=$app->getTextObjectViewFor($this, $app, $userId );
			if($this->textobjectTimeLength < $textobjectViewTmp->getDuration()){
				$this->textobjectTimeLength = $textobjectViewTmp->getDuration();			
			}
			// draw a new image
			// todo: save path?
			drawWaveform($textobjectViewTmp->textobjectObject->textobjectArgumentText,'./audio/waveforms/waveform'.$textobjectViewTmp->getId().'.png');	
		}
		
	}
	
    
?>