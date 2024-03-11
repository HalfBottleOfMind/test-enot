<?php

class SettingsController
{
	public function update(Request $request): Response
	{
		Auth::user()->tmpSaveNewSettings(Settings::fromArray($request->get('settings')));
		Confirmation::sendConfirmationCode(Auth::user());
		return response()->success();
	}

	public function confirm(Request $request): Response
	{
		if (!Confirmation::check(Auth::user(), $request->get('code')) {
			return response()->error();
	  	}

		Auth::user()->commitNewSettings();

		return response()->success();
	}
}

