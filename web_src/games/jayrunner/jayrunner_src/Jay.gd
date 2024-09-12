extends CharacterBody2D


const SPEED = 300.0
const JUMP_VELOCITY = -400.0

var game_over = false

func _physics_process(delta: float) -> void:
	# Add the gravity.
	if not is_on_floor() && not game_over:
		velocity += get_gravity() * delta

	# Handle jump.
	if Input.is_action_pressed("ui_accept") and is_on_floor():
		velocity.y = JUMP_VELOCITY
	
	if Input.is_action_just_released("ui_accept") and velocity.y < 0:
		velocity.y = 0
	
	move_and_slide()
	
	if game_over:
		velocity = Vector2(0, 0)
		if Input.is_action_just_pressed("ui_accept"):
			get_tree().reload_current_scene()


func _on_obstacles_end_game() -> void:
	game_over = true
