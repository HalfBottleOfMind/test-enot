<?php

interface ConfirmationStrategy
{
	public function sendConfirmationCode(User $user): void;

	public function check(User $user, int $code): bool;
}

