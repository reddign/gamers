extends CharacterBody2D

const SPEED = 300.0
const JUMP_VELOCITY = -750.0

var game_over = false

func _physics_process(delta: float) -> void:
	# Add the gravity. Gravity is set in project settings
	if not is_on_floor() && not game_over:
		velocity += get_gravity() * delta

	# Handle jump.
	if Input.is_action_pressed("ui_accept") and is_on_floor():
		velocity.y = JUMP_VELOCITY
	# Hand short-hops. Allows jump to end prematurely if jump not held.
	if Input.is_action_just_released("ui_accept") and velocity.y < 0:
		velocity.y = 0
	
	move_and_slide() # Unsure of what this does, just know physics doesn't work without it.
	
	if game_over:
		velocity = Vector2(0, 0)
		if Input.is_action_just_pressed("ui_accept"): # Restart game with reload current scene method
			get_tree().reload_current_scene()
		
	# handle animation
	if is_on_floor():
		$AnimatedSprite2D.animation = "walk"
	else:
		$AnimatedSprite2D.animation = "jump"


func _on_obstacles_end_game() -> void:
	game_over = true

func stop_scrolling():
	game_over = true
