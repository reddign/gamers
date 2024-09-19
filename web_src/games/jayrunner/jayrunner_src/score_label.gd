extends Label

var score:int = 0
var game_over = false
var frames_since_last_increment = 0
var frames_per_increment = 30  # Increment score every 30 frames

@onready var js_object = $"/root/Main/JSObject"

# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(_delta: float) -> void:
	if not game_over:
		score += 1
		text = "Score: %010d" % score

func _on_obstacles_end_game() -> void:
	game_over = true
	if OS.has_feature('web'):
		JavaScriptBridge.eval("""
			console.log('Sending game over message with score: %s');
			window.parent.postMessage({type: 'gameOver', score: %s}, '*');
		""" % [score, score])
	else:
		print("Game Over! Score: %s" % score)

func stop_scrolling():
	game_over = true
	if OS.has_feature('web'):
		JavaScriptBridge.eval("""
			console.log('Sending game over message with score: %s');
			window.parent.postMessage({type: 'gameOver', score: %s}, '*');
		""" % [score, score])
	else:
		print("Game Over! Score: %s" % score)
