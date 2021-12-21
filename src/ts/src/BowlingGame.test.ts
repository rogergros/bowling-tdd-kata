import { BowlingGame } from './BowlingGame';

describe('BowlingGame', () => {
	it('Test boilerplate that fails', () => {
		// Arrange
		const bowlingGame = new BowlingGame();

		// Act
		const score = bowlingGame.score();

		// Assert
		expect(score).toBe(0);
	});
});