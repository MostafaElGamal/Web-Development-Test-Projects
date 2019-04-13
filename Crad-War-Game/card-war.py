

from random import shuffle


class Deck(object):
    """
    This is the Deck Class. This object will create a deck of cards to initiate
    play. You can then use this Deck list of cards to split in half and give to
    the players. It will use SUITE and RANKS to create the deck. It should also
    have a method for splitting/cutting the deck in half and Shuffling the deck.
    """
    def __init__(self):

        self.SUITE = 'H D S C'.split()
        self.RANKS = '2 3 4 5 6 7 8 9 10 J Q K A'.split()
        self.dick = []
        self.dickcards()
        self.shuffleing()

    def shuffleing(self):
        shuffle(self.dick)


    def split(self):
        first, second = self.dick[:len(self.dick)/2], self.dick[len(self.dick)/2:]

        return first , second

    def dickcards(self):
        for s in self.SUITE:
            for k in self.RANKS:
                self.dick.append( k ) # You Can add Suites Here if you want to use it in you dick :D



class Hand(Deck):
    '''
    This is the Hand class. Each player has a Hand, and can add or remove
    cards from that hand. There should be an add and remove card method here.
    '''
    def __init__(self):
        Deck.__init__(self)
        self.hand = self.split()[0]
        self.pc = self.split()[1]



    def remove(self,player,item):
        index = player.index(str(item))
        return player.pop(index)


    def add(self,player,item):
        return player.append(item)



class Player(Hand):
    """
    This is the Player class, which takes in a name and an instance of a Hand
    class object. The Payer can then play cards and check if they still have cards.
    """
    def __init__(self):
        Hand.__init__(self)


    def playerCard(self):

        if len(self.hand) != 1:
            card = self.hand[0]
            return card
        else:
            print "You Out of Cards Pc Won"
            return False


    def pcCard(self):

        if len(self.pc) != 1:
            card = self.pc[0]
            return card
        else:
            print self.name+" :you Win "
            return False


print("Welcome to War, let's begin...")

class GameOn(Player):
# Use the 3 classes along with some logic to play a game of war!

    def __init__(self, name):
        Player.__init__(self)
        self.name  = name
        self.war = False
        self.play = True
#-------------------------------------------------------------------
#-------------------------------------------------------------------
    def start(self):

        while self.play :
            player = self.playerCard()
            pc = self.pcCard()
            enter = raw_input("Press Enter to see your cards >>!")

            print("Player-1 your Card is: {}".format(player))
            print("Pc Card is -----------:{}".format(pc))


            print("Now you have {} Cards".format(len(self.hand) ) )
            print("The Computer have {}".format(len(self.pc) ) )


            self.cards_check(player, pc)

            if len(self.hand) == 1:
                self.play = False
                print "You Lost the Game...!"
            if len(self.pc) == 1:
                self.play = False
                print "You Won the Game...!"

    def cards_check(self, player1, player2):
        temp1 = player1
        temp2 = player2

        if player1 == player2:
            self.war_on()

        if player1 == "A":
            temp1 = "A"
            player1 = 14

        if player2 == "A":
            temp2 = "A"
            player2 = 14

        if player1 == "K":
            temp1 = "K"
            player1 = 13

        if player2 == "K":
            temp2 = "K"
            player2 = 13

        if player1 == "Q":
            temp1 = "Q"
            player1 = 12

        if player2 == "Q":
            temp2 = "Q"
            player2 = 12

        if player1 == "J":
            temp1 = "J"
            player1 = 11

        if player2 == "J":
            temp2 = "J"
            player2 = 11


        if int(player1) > int(player2):
            self.add(self.hand, self.remove(self.pc, temp2) )

        else:
            self.add(self.pc, self.remove(self.hand, temp1) )


    def war_on(self):
        print "The War is On"
        arr = []
        for n in range(1,4):
            arr.append(self.hand.pop(n))
            arr.append(self.pc.pop(n))

        if self.hand[1] > self.pc[1]:
            self.hand + arr
            self.war = False

        if self.hand[1] == self.pc[1]:
            self.war_on()

        else:
            self.pc + arr
            self.war = False


x = GameOn("me")
x.start()
