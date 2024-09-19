extends Label

var score = 0
var game_over = false
var frames_since_last_increment = 0
var frames_per_increment = 30  # Increment score every 30 frames

@onready var js_object = $"/root/Main/JSObject"

# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(_delta: float) -> void:
	if not game_over:
		frames_since_last_increment += 1
		if frames_since_last_increment >= frames_per_increment:
			score += 1
			frames_since_last_increment = 0
		text = "Score: %d" % score

func _on_obstacles_end_game() -> void:
	game_over = true
	if OS.has_feature('web'):
		JavaScriptBridge.eval("""
			console.log('Sending game over message with score: %s');
			window.parent.postMessage({type: 'gameOver', score: %s}, '*');
		""" % [score, score])
	else:
		print("Game Over! Score: %s" % score)
