extends Area2D

var game_over = false
var SCROLL_SPEED:int

# When spawning a new obstacle, run this block
func _ready():
	position.x = 1400
	$Enemy.play(var_to_str(randi_range(1, 3)), SCROLL_SPEED / 300) # Play a random animation from 1 to 3, called by converting a random int into a string, which is how Godot parses animation names
	add_to_group("obstacles") # Add to appropriate groups
	add_to_group("scrollers")

func _process(delta):
	if not game_over:
		position.x -= SCROLL_SPEED * delta # Move every frame based on 'delta' (frametime)

func _on_body_entered(_body: CharacterBody2D) -> void:
	game_over = true
	$Enemy.pause() # Pause animation
	get_tree().call_group("obstacles","stop_moving")
	get_tree().call_group("scrollers","stop_scrolling")
	print("GAME OVER")
	print("Press space to try again!")


func stop_moving():
	game_over = true
	$Enemy.pause()

func update_scrolling_speed(CURRENT_SPEED):
	SCROLL_SPEED = CURRENT_SPEED
