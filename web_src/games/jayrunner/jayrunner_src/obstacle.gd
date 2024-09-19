extends Area2D

signal end_game

var game_over = false
@export var SCROLL_SPEED = 300

func _ready():
	position.x = 1400
	$cat2D.play()
	add_to_group("obstacles")

func _process(delta):
	if not game_over:
		position.x -= SCROLL_SPEED * delta
	
	if position.x < -200:
		queue_free()



func _on_body_entered(_body: CharacterBody2D) -> void:
	game_over = true
	$cat2D.pause()
	emit_signal("end_game")
	get_tree().call_group("obstacles","stop_moving")
	get_tree().call_group("scrollers","stop_scrolling")
	print("GAME OVER")
	print("Press space to try again!")


func stop_moving():
	game_over = true
	$cat2D.pause()
