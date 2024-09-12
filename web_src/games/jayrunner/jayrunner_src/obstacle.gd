extends Area2D

signal end_game

var game_over = false

func _ready():
	position.x = 600

func _process(delta):
	if not game_over:
		position.x -= 100 * delta


func _on_body_entered(body: CharacterBody2D) -> void:
	game_over = true
	emit_signal("end_game")
	print("GAME OVER")
	print("Press space to try again!")
