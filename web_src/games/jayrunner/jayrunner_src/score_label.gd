extends Label

var score = 0
var game_over = false

# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(delta: float) -> void:
	if not game_over:
		score += delta * 10
		text = "Score: %1.3f" % score


func _on_obstacles_end_game() -> void:
	game_over = true
